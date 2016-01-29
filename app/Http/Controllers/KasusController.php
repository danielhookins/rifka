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
use rifka\Library\ExcelUtils;
use rifka\Library\KasusUtils;
use rifka\Library\AIUtils;
use rifka\Library\ETLUtils;


class KasusController extends Controller {

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		// Only allow authenticated users
		$this->middleware('auth');
		
		// Only allow active users
		$this->middleware('active');

		// Grant access to counsellors, managers and developers
		$this->middleware('userType:Konselor');
	}

	
	/**
	 * Display a listing of all cases 
	 * and the ability to search for a specific case.
	 *
	 * @return view - The case index page
	 */
	public function index()
	{
		$semuaKasus = \rifka\Kasus::orderBy('kasus_id', 'DESC')->paginate(15);

		return view('kasus.index', array(
			'search'	 => true, // show the search widget 
			'list'		 => true, // show a list of all cases
			'semuaKasus' => $semuaKasus,
			));
	}


	/**
	 * Show the form for creating a new case.
	 *
	 * @return view - The create new case form
	 */
	public function create()
	{
		return view('kasus.create');
	}


	/**
	 * Store a newly created case in the database.
	 *
	 * @return redirect - To the newly created case page
	 */
	public function store(Request $request)
	{

		try {
			// Create the new case with user input
			$kasus = KasusUtils::createNewCase(\Input::get());

			// Create the new client-case(s) 
			// for clients stored in session data.
			KasusUtils::createClientCaseFromSession($request, $kasus->kasus_id);

			return redirect('kasus/'.$kasus->kasus_id)
			->with('success', 'New case created.');

		} catch (Exception $e) {

			return redirect()->back();

		}

	}


	/**
	 * Display the specified case.
	 *
	 * @param  int  $kasus_id
	 * @return Response
	 */
	public function show(Request $request, $kasus_id)
	{
		$kasus = \rifka\Kasus::findOrFail($kasus_id);
	
		// Flash suggestions to aid user-experience
		$request->session()->flash("suggestions", AIUtils::getSuggestions($kasus));
		
		return view('kasus.show', array('kasus' => $kasus));
	}


	/**
	 *	Show the form for editing the specified case.
	 *	** This is not currently in use **
	 *
	 *	@param int $kasus_id
	 *	@return redirect - To Case Page.
	 */
	public function edit($kasus_id)
	{
		return redirect()->route('kasus.show', $kasus_id);
	}


	/**
	 * Update the specified case in the database.
	 *
	 * @param  int  $kasus_id
	 * @return redirect to the specified case page.
	 */
	public function update($kasus_id)
	{

		try {
	
			KasusUtils::updateCase($kasus_id, \Input::get());
			
			return redirect()->route('kasus.show', $kasus_id)
				->with('success', 'Kasus updated.');
	
		} Catch (Exception $e) {
			
			return $e;
	
		}
		
	}


	/**
	 *	Remove the specified case from the database.
	 *	This also removes the related entries in the klien_kasus (client_case) table.
	 *
	 * @param  int  $kasus_id
	 * @return redirect home with success or return Exception $e
	 */
	public function destroy($kasus_id)
	{
		$kasus = Kasus::findOrFail($kasus_id);
		$klienKasus2 = KlienKasus::where('kasus_id', $kasus_id);
		
		try {

			foreach ($klienKasus2->select('kasus_id')->get() as $klienKasus)
			{
				$klien_id = $klienKasus->klien_id; // Save id for logging
				$klienKasus->delete();
			}

			$kasus->delete();

			return redirect()->route('home')
				->with('success', 'Kasus #'.$kasus_id.' has been deleted.');

		} catch (Exception $e) {

			return $e;

		}

	}


	/**
	 *	Show the confirm delete dialog
	 *	asking the user if they really want to delete?
	 *
	 *	@param int $kasus_id
	 */
	public function confirmDestroy($kasus_id)
	{
	
		return view('kasus.destroy', array('kasus_id' => $kasus_id));
	
	}


	public function search(Request $request)
	{
		$this->validate($request, ['searchQuery' => 'required|max:255']);

		$query = \Input::get('searchQuery');		
		$results = \rifka\Kasus::search($query)->orderBy('relevance', 'DESC')->get();

  	return view('kasus.searchResults', array(
			'query'		=> $query,
			'results'	=> $results));
	}


	public function tambahKasusKlien($kasus_id, $klien_id)
	{
		$kasus = \rifka\Kasus::findOrFail($kasus_id);
		$klien = \rifka\Klien::findOrFail($klien_id);

		// Check client not already added
		foreach($kasus->klienKasus()->get() as $klienKasus) 
		{
			if($klienKasus->klien_id == $klien_id)
			{
				return 'Client already exists in case';
			}
		}

		// Add client to case.
		$klienKasus = \rifka\KlienKasus::create([
				'klien_id' 		=> $klien_id,
				'kasus_id' 		=> $kasus_id,
				'jenis_klien' 	=> null]);

		return redirect()->route('kasus.show', $kasus_id)
			->with('success', 'Client added to case.');

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
	 * @return Redirect back to the create page.
	 */
	public function tambahKlien(Request $request, $type)
	{
	  if($type == "korban")
	  {
	  	$request->session()->flash('tambahKorban', True);
	  }
	  else if($type == "pelaku")
	  {
	  	$request->session()->flash('tambahPelaku', True);
	  }
	  else if($type == "klien")
	  {
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
				$deleted = KlienKasus::where('klien_id', $klien_id)
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


	/**
	 *  Export case information to an Excel file
	 *
	 */
	public function exportXLS($kasus_id)
	{
		return ExcelUtils::exportCaseInfoXLS($kasus_id);
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
