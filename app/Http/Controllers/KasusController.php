<?php namespace rifka\Http\Controllers;

use rifka\Http\Requests;
use rifka\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
		//
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
										'attributes' => $attributes
										));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
		return view('kasus.index', array(
				'create' => True
			));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		//TODO: Ensure validation

		//KASUS BARU
		$kasus = \rifka\Kasus::create([
				'jenis_kasus' => \Input::get('jenis_kasus'),
				'hubungan' => \Input::get('hubungan'),
				'lama_hubungan' => \Input::get('lama_hubungan'),
				'sejak_kapan' => \Input::get('sejak_kapan'),
				'seberapa_sering' => \Input::get('seberapa_sering'),
				'harapan_korban' => \Input::get('harapan_korban'),
				'rencana_korban' => \Input::get('rencana_korban'),
				'narasi' => \Input::get('narasi'),
			]);

		//KLIEN-KASUS BARU
		$korban2 = $request->session()->pull('korban2');
		$pelaku2 = $request->session()->pull('pelaku2');

		foreach($korban2 as $korban)
		{
			$klienKasus = \rifka\KlienKasus::create([
				'klien_id' 		=> $korban->klien_id,
				'kasus_id' 		=> $kasus->kasus_id,
				'jenis_klien' 	=> 'Korban'
				]);
		}

		foreach($pelaku2 as $pelaku)
		{
			$klienKasus = \rifka\KlienKasus::create([
				'klien_id' 		=> $pelaku->klien_id,
				'kasus_id' 		=> $kasus->kasus_id,
				'jenis_klien' 	=> 'Pelaku'
				]);
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
	public function show($id)
	{
		//
		$kasus = \rifka\Kasus::findOrFail($id);
		$klien2 = \rifka\Kasus::find($id)->klienKasus;
		$arsip2 = \rifka\Kasus::find($id)->arsip;
		$bentuk2 = \rifka\Kasus::find($id)->bentuk;

		return view('kasus.index', array(
									'show'		=> True,
									'kasus' 	=> $kasus,
									'klien2'	=> $klien2,
									'arsip2'	=> $arsip2,
									'bentuk2'	=> $bentuk2
									));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

	public function search()
	{
		$query = \Input::get('searchQuery');		
		$results = \rifka\Kasus::search($query)->get();

    	return view('kasus.searchResults', array(
    									'query'		=> $query,
										'results'	=> $results
									));
	}


	public function showCreatePage($page_id)
	{
		return $page_id;
	}

	// if case doesnt exist, create it.
	// check client exists and not already added to case
	// add client to case
	public function tambahKasusKlien($kasus_id, $klien_id)
	{
		
		// Ensure Case exists
		if($kasus = \rifka\Kasus::find($kasus_id))
		{
			$kasusTest = "kasus found: ".$kasus_id;
			$klien2 = $kasus->klienKasus()->get();
			
			// Check client not already added
			foreach($klien2 as $klien) {
				if($klien->klien_id == $klien_id)
				return 'Client already exists in case';
			}
		}
		else
		{
			// Case doesn't exist - create new
			$kasusTest = 'new case: '.$kasus_id;
		}

		// Ensure Client Exists
		if($klien = \rifka\Klien::find($klien_id))
		{
			// Add client to case.
			$kasusTest = $kasusTest."<br />Client: ".$klien_id;
			return $kasusTest;
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

}
