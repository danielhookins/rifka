<?php namespace rifka\Http\Controllers;

use rifka\Http\Requests;
use rifka\Http\Controllers\Controller;
use Illuminate\Http\Request;
use rifka\Kasus;
use rifka\KlienKasus;
use rifka\BentukKekerasan;
use rifka\LayananDibutuhkan;
use Auth;
use DB;

class KasusController extends Controller {

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth');
	}
	
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$semuaKasus = \rifka\Kasus::orderBy('kasus_id', 'DESC')->paginate(15);

		if ($semuaKasus->count()) {
			$attributes = $semuaKasus->first()->toArray();
		} 
		else 
		{
			$attributes = array();
		}
		

		return view('kasus.index', array(
			'search'	 => True,
			'list'		 => True,
			'semuaKasus' => $semuaKasus,
			'attributes' => $attributes));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('kasus.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		//TODO: Ensure validation

		$user = Auth::user();

		//KASUS BARU
		$kasus = \rifka\Kasus::create([
			'jenis_kasus' 		=> \Input::get('jenis_kasus'),
			'hubungan' 				=> \Input::get('hubungan'),
			'lama_hubungan' 	=> \Input::get('lama_hubungan'),
			'jenis_lama_hub'  => \Input::get('jenis_lama_hub'),
			'sejak_kapan' 		=> \Input::get('sejak_kapan'),
			'seberapa_sering' => \Input::get('seberapa_sering'),
			'harapan_korban' 	=> \Input::get('harapan_korban'),
			'rencana_korban' 	=> \Input::get('rencana_korban'),
			'narasi' 					=> \Input::get('narasi'),]);

		// Log Activity
		// TODO: look at using 'Events' for logging instead
    $activity = \rifka\Activity::create([
			'user_id' => $user->id,
			'kasus_id' => $kasus->kasus_id,
			'action' => "Created Case"]);

		//KLIEN-KASUS BARU
		if($korban2 = $request->session()->pull('korban2'))
		{
			foreach($korban2 as $korban)
			{
				$klienKasus = \rifka\KlienKasus::create([
					'klien_id' 		=> $korban->klien_id,
					'kasus_id' 		=> $kasus->kasus_id,
					'jenis_klien' 	=> 'Korban']);
			}
		}

		// Create a record of related perps if they exist
		if($pelaku2 = $request->session()->pull('pelaku2'))
		{
			foreach($pelaku2 as $pelaku)
			{
				$klienKasus = \rifka\KlienKasus::create([
					'klien_id' 		=> $pelaku->klien_id,
					'kasus_id' 		=> $kasus->kasus_id,
					'jenis_klien' => 'Pelaku']);
			}
		}

		return redirect('kasus/'.$kasus->kasus_id)
			->with('success', 'New case created.');;
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show(Request $request, $id)
	{
		
		//Ensure case exists
		if($kasus = \rifka\Kasus::find($id))
		{	

			// If no clients are attached to the case
			// suggest that the user adds a client.
			if(empty($kasus->klienKasus->toArray())) 
			{
				$suggestion = "Kasus ini belum ada klien.  Anda mau <a href='" . route('tambah.klien', 'klien') . "#klien-kasus'>tambah klien</a> sekarang?";

				$request->session()->flash("suggestion", $suggestion);
			}

			return view('kasus.show', array(
				'kasus' => $kasus
				));
		}

		return redirect('404');

	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id, $section = 'all')
	{
		$kasus = Kasus::findOrFail($id);

		return view('kasus.edit', array(
			'kasus' => $kasus,
			'section' => $section));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//TODO: Ensure validation

		$user = Auth::user();
		
		// UPDATE KASUS
		$kasus = Kasus::findOrFail($id);
		$attributes = array_keys($kasus->getAttributes());

		// Update Kasus and Log Attribute Changes
		// TODO: look at using 'Events' for logging instead
		foreach($attributes as $attribute)
		{
			if(\Input::get($attribute) && $kasus->$attribute != \Input::get($attribute))
			{
				$attributeChange = \rifka\AttributeChange::create([
					'user_id' => $user->id,
					'kasus_id' => $kasus->kasus_id,
					'attribute_name' => $attribute,
					'old_attribute_value' => $kasus->$attribute,
					'new_attribute_value' => \Input::get($attribute)]);
				
				$kasus->$attribute = \Input::get($attribute);
				$kasus->save();
			}
		}

		// TODO: [Refactor] Use service for this?
		// UPDATE BENTUK KEKERASAN
		if ($bentuk_id = \Input::get('bentuk_id'))
		{
			$bentuk = BentukKekerasan::findOrFail($bentuk_id);
			$attributes = array_keys($bentuk->getAttributes());

			foreach($attributes as $attribute)
			{
				
				if($bentuk->$attribute != \Input::get($attribute))
				{

					$attributeChange = \rifka\AttributeChange::create([
						'user_id' => $user->id,
						'kasus_id' => $kasus->kasus_id,
						'attribute_name' => $attribute,
						'old_attribute_value' => $bentuk->$attribute,
						'new_attribute_value' => \Input::get($attribute)]);
					
					$bentuk->$attribute = \Input::get($attribute);
					$bentuk->save();
				}
			}
		}

		// UPDATE LAYANAN DIBUTUHKAN
		// TODO: again [refactor] duplicate code
		if ($layanan_dbth_id = \Input::get('layanan_dbth_id')) 
		{
			$layanan = LayananDibutuhkan::findOrFail($layanan_dbth_id);
			$attributes = array_keys($layanan->getAttributes());

			foreach($attributes as $attribute)
			{
				
				if($layanan->$attribute != \Input::get($attribute))
				{

					$attributeChange = \rifka\AttributeChange::create([
						'user_id' => $user->id,
						'kasus_id' => $kasus->kasus_id,
						'attribute_name' => $attribute,
						'old_attribute_value' => $layanan->$attribute,
						'new_attribute_value' => \Input::get($attribute)]);
					
					$layanan->$attribute = \Input::get($attribute);
					$layanan->save();
				}
			}
		}

		return redirect()->route('kasus.show', $id)
			->with('success', 'Kasus updated.');
		}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($kasus_id)
	{
		$kasus = Kasus::findOrFail($kasus_id);
		$klienKasus2 = KlienKasus::where('kasus_id', $kasus_id);
		$user = Auth::user();

		foreach ($klienKasus2->select('kasus_id')->get() as $klienKasus)
		{
			$klien_id = $klienKasus->klien_id; // Save id for logging
			
			$klienKasus->delete();
			
			// Log Activity
			// TODO: look at using 'Events' for logging instead
      $logRemoveClient = \rifka\Activity::create([
				'user_id' => $user->id,
				'klien_id' => $klien_id,
				'kasus_id' => $kasus_id,
				'action' => "Removed Client"
				]);
		}

		$kasus->delete();

		// Log Activity
		// TODO: look at using 'Events' for logging instead
        $logDeleteClient = \rifka\Activity::create([
				'user_id' => $user->id,
				'kasus_id' => $kasus_id,
				'action' => "Deleted Case"
				]);

		return redirect()->route('home')
			->with('success', 'Kasus #'.$kasus_id.' has been deleted.');

	}

	/**
	 * Show the confirm delete dialog
	 * asking the user if they really want to delete?
	 */
	public function confirmDestroy($kasus_id)
	{
		return view('kasus.destroy', array('kasus_id' => $kasus_id));
	}

	public function search()
	{
		$query = \Input::get('searchQuery');		
		$results = \rifka\Kasus::search($query)->get();

    	return view('kasus.searchResults', array(
				'query'		=> $query,
				'results'	=> $results));
	}

	// if case doesnt exist, create it.
	// check client exists and not already added to case
	// add client to case
	// TODO: show error messages nicely
	public function tambahKasusKlien($kasus_id, $klien_id)
	{
		// Ensure Case exists
		if($kasus = \rifka\Kasus::find($kasus_id))
		{
			$klien2 = $kasus->klienKasus()->get();
			
			// Check client not already added
			foreach($klien2 as $klien) {
				if($klien->klien_id == $klien_id)
				return 'Client already exists in case';
			}
		}
		
		/* OPTIONAL FUNCTIONALITY TO CREATE NEW CASE
		else
		{
			// Case doesn't exist - create new
			$kasusTest = 'new case: '.$kasus_id;
		}
		*/

		// Ensure Client Exists
		if($klien = \rifka\Klien::find($klien_id))
		{
			// Add client to case.
			$klienKasus = \rifka\KlienKasus::create([
					'klien_id' 		=> $klien_id,
					'kasus_id' 		=> $kasus_id,
					'jenis_klien' 	=> null]);

			return redirect()->route('kasus.show', $kasus_id)
			->with('success', 'Client added to case.');
		} 
		else
		{
			return 'Error: Client doesnt exist';
		}
		return 'An error occurred.<br /> Could not add client to case.';
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
	  	return redirect()->back();
	  }
		
		return redirect()->route('kasus.create');
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

	public function autoUpdate(Request $request)
	{
		if($request->ajax()){
			$data = \Input::all();

			if(isset($data["table"]))
			{
				
				// Store new entry in Klien Kasus Table
				if($data["table"] == "klien_kasus")
				{

					$klienKasus = KlienKasus::where('klien_id', (int) $data["klien_id"])
						->where('kasus_id', (int) $data["kasus_id"])
          	->update(['jenis_klien' => $data["jenis_klien"]]);

					return var_dump($klienKasus);
				}
			}
			

			return 'no table to update';
		}
		else
		{
			return 'no ajax';
		}
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
}
