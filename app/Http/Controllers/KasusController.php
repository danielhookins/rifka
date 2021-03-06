<?php namespace rifka\Http\Controllers;

use Auth;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;
use rifka\Http\Requests;
use rifka\Http\Controllers\Controller;
use rifka\Kasus;
use rifka\KlienKasus;
use rifka\KonselorKasus;
use rifka\BentukKekerasan;
use rifka\LayananDibutuhkan;
use rifka\DWKorbanKasus;
use rifka\Library\KasusUtils;
use rifka\Library\ResourceUtils;
use rifka\Library\AIUtils;
use rifka\Library\ETLUtils;

class KasusController extends Controller {

  /*
  |--------------------------------------------------------------------------
  | Kasus (Client) Controller
  |--------------------------------------------------------------------------
  |
  | This controller handles kasus functionality.
  |
  */
	
	/**
	 * Show the default kasus page.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('search.kasus');
	}

	/**
	 * Show the form for creating a new case.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('kasus.create');
	}

	/**
	 * Store a newly created case in the database.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		try {
			$kasus = KasusUtils::createNewCase(\Input::get());
			$klienKasus = KasusUtils::createClientCaseFromSession($request, $kasus->kasus_id);

			if (\Input::get('no_reg') != null) {
				$arsip = ResourceUtils::storeResource($kasus->kasus_id, "arsip", \Input::get(), array('no_reg','media', 'lokasi'));
			}

			return redirect('kasus/'.$kasus->kasus_id)
				->with('success', 'New case created.');
		} catch (Exception $e) { return redirect()->back();	}
	}

	/**
	 * Display the specified case.
	 *
	 * @param Request $request
	 * @param integer  $kasus_id
	 * @return Response
	 */
	public function show(Request $request, $kasus_id)
	{
		$kasus = \rifka\Kasus::findOrFail($kasus_id);
		$request->session()
			->flash("suggestions", AIUtils::getCaseInputSuggestions($kasus));
	
		return view('kasus.show', array('kasus' => $kasus));
	}

	/**
	 * Update the specified case in the database.
	 *
	 * @param  integer  $kasus_id
	 * @return Response
	 */
	public function update($kasus_id)
	{
		try {
			KasusUtils::updateCase($kasus_id, \Input::get());
			return redirect()->route('kasus.show', $kasus_id)
				->with('success', 'Kasus updated.');
		} catch (Exception $e) { return $e; }
	}

	/**
	 *	Remove the specified case from the database.
	 *	This also removes the related entries in the 
	 *  klien_kasus (client_case) table.
	 *	And the related entries form the Data Warehouse
	 *
	 * @param  integer  $kasus_id
	 * @return Response
	 */
	public function destroy($kasus_id)
	{
		try {
			$deletedKasus = Kasus::findOrFail($kasus_id)->delete();
			$deletedKlienKasus = KlienKasus::where('kasus_id', $kasus_id)->delete();
			$deletedDataWarehouse = DWKorbanKasus::where('kasus_id', $kasus_id)->delete();
			return redirect()->route('home')
				->with('success', 'Kasus #'.$kasus_id.' has been deleted.');
		} catch (Exception $e) {	return $e; }
	}

	/**
	 *	Show the confirm delete dialog
	 *	asking the user if they really want to delete?
	 *
	 *	@param integer $kasus_id
	 *  @return Response
	 */
	public function confirmDestroy($kasus_id)
	{
		return view('kasus.destroy', array('kasus_id' => $kasus_id));
	}

	/**
	 *	Add a client to a case
	 *
	 *	@param integer $kasus_id
	 *	@param integer $klien_id
	 *  @return Response
	 */
	public function tambahKasusKlien()
	{
		KasusUtils::addKlienKasus(\Input::get());
		return redirect()->route('kasus.show', \Input::get("kasus_id"));
	}

	// add counsellor to case
	public function tambahKasusKonselor($kasus_id, $konselor_id)
	{
		// Ensure Case exists
		if($kasus = \rifka\Kasus::find($kasus_id))
		{
			$konselor2 = $kasus->konselorKasus()->get();
			
			// Check client not already added
			foreach($konselor2 as $konselor) {
				if($konselor->konselor_id == $konselor_id)
				return 'Counsellor already exists in case';
			}
		}

		// Ensure Counsellor Exists
		if($konselor = \rifka\Konselor::find($konselor_id))
		{
			// Add counselor to case.
			$konselorKasus = \rifka\KonselorKasus::create([
					'konselor_id' => $konselor_id,
					'kasus_id' 		=> $kasus_id]);

			return redirect()->route('kasus.show', [$kasus_id, '#konselor']);
			
		} 
		else
		{
			return 'Error: Counsellor doesnt exist';
		}
		return 'An error occurred.<br /> Could not add counsellor to case.';
	}

  /**
	 * Show the section to add a new Victim or Perp
	 * to the New Case form.
	 *
	 * @param Request $request
	 * @param String $type
	 * @return Response
	 */
	public function tambahKlien(Request $request, $type)
	{
	  if($type == "korban") 
	  	$request->session()->flash('tambahKorban', True);
	  else if($type == "pelaku")
	  	$request->session()->flash('tambahPelaku', True);
	  else if($type == "klien") {
	  	$request->session()->flash('tambahKlien', True);
	  	return Redirect::to(URL::previous() . "#klien-kasus");
	  }
		return redirect()->route('kasus.create');
	}

	public function tambahKonselor(Request $request)
	{
		$request->session()->flash('tambahKonselor', True);
		return Redirect::to(URL::previous() . "#konselor");
	}

	public function seshPushKlien(Request $request, $klien_id, $jenis)
	{
		$klien = \rifka\Klien::findOrFail($klien_id);
		
		if ($jenis == "Korban") 
		{
			$request->session()->push('korban2', $klien);
		}
		elseif ($jenis == "Pelaku")
		{
			$request->session()->push('pelaku2', $klien);
		}

		return redirect()->route('kasus.create');
	}

	public function seshRemoveKlien(Request $request)
	{
		if(isset($_POST['deleteKorban']))
		{
			$jenis = 'korban2';
			$klien2 = $request->session()->get('korban2');
		}
		elseif(isset($_POST['deletePelaku']))
		{
			$jenis = 'pelaku2';
			$klien2 = $request->session()->get('pelaku2');
		}
		else
		{
			return redirect()->route('kasus.create');
		}

		if(!$selectedList = \Input::get('selected'))
		{
			return redirect()->route('kasus.create');
		}

		foreach ($selectedList as $selected) 
		{
			$found = false;  
			foreach($klien2 as $key => $value) 
			{
		    if ((string)$value->klien_id == $selected) 
		    {
		        $found = true;
		        break;
		    }
		  }
		if ($found) unset($klien2[$key]);
		}	

		if (empty($klien2))
		{
			$request->session()->forget($jenis);
		}
		else 
		{
			$request->session()->put($jenis, $klien2);
		}
		
		return redirect()->route('kasus.create');
	}

	public function deleteKlien2Kasus($kasus_id) 
	{
		
		if($toDelete = \Input::get('toDelete'))
		{
			foreach($toDelete as $klien_id)
			{
				// Delete from klien kasus
				$deleted = KlienKasus::where('klien_id', $klien_id)
						->where('kasus_id', $kasus_id)->delete();

				// Remove from Data Warehouse
				$remove = DWKorbanKasus::where('klien_id', $klien_id)
						->where('kasus_id', $kasus_id)->delete();
			}
		}
		return redirect()->back();
	}

	public function deleteKonselor2Kasus($kasus_id) 
	{
		
		if($toDelete = \Input::get('toDelete'))
		{
			foreach($toDelete as $konselor_id)
			{
				$deleted = KonselorKasus::where('konselor_id', $konselor_id)
						->where('kasus_id', $kasus_id)->delete();
			}
		}
		return Redirect::to(URL::previous() . "#konselor");
	}

	// AJAX auto update type of client
	public function autoUpdate(Request $request)
	{
		if($request->ajax()){
			$data = \Input::all();

			if(isset($data["table"]))
			{
				// Store new entry in Klien Kasus Table
				if($data["table"] == "klien_kasus")
				{
					// Update Klien Kasus
					$klienKasus = KlienKasus::where('klien_id', '=', $data["klien_id"])
						->where('kasus_id', '=', $data["kasus_id"])
			    	->update(['jenis_klien' => $data["jenis_klien"]]);
					
			    // Update Data Warehouse
					$dwCheck = DB::table('dw_korban_kasus')
														->where('kasus_id', '=', $data["kasus_id"])
			        							->where('klien_id', '=', $data["klien_id"])
			        							->count();

					// Add new victim to DW Korban Kasus
					if(($dwCheck === 0) && ($data["jenis_klien"] == "Korban")) {
						ETLUtils::addVictim($data["klien_id"], $data["kasus_id"]);
					}

					// Remove client from DW Korban Kasus
					if(($dwCheck !== 0) && ($data["jenis_klien"] != "Korban")) {
						$deletedRows = DB::table('dw_korban_kasus')
														->where('kasus_id', '=', $data["kasus_id"])
			        							->where('klien_id', '=', $data["klien_id"])
			        							->delete();
					}

				} // Store new entry

			}

		}

	return;
	}

}
