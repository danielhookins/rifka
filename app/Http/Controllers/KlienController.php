<?php namespace rifka\Http\Controllers;

use rifka\Http\Controllers\Controller;
use rifka\Klien;
use rifka\Activity;
use rifka\AttributeChange;
use Illuminate\Http\Request;
use Auth;
use DB;

class KlienController extends Controller {

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		// Only allow authenticated users
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
		$semuaKlien = Klien::orderBy('klien_id', 'DESC')->paginate(15);

		return view('klien.index', array(
			'search'	 => True,
			'list'		 => True,
			'semuaKlien' => $semuaKlien));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
		return view('klien.index', array('create' => True));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//TODO: Ensure validation

		$user = Auth::user();
		$returnPage = \Input::get('returnPage');

		// Create new Client
		$klienBaru = Klien::create([
				'nama_klien' 				=> \Input::get('nama_klien'),
				'kelamin'						=> \Input::get('kelamin'),
				'tanggal_lahir' 		=> \Input::get('tanggal_lahir'),
				'agama' 						=> \Input::get('agama'),
				'status_perkawinan' => \Input::get('status_perkawinan'),
				'no_telp' 					=> \Input::get('no_telp'),
				'email' 						=> \Input::get('email'),
				'jumlah_anak'				=> \Input::get('jumlah_anak'),
				'jumlah_tanggungan' => \Input::get('tanggungan'),
				'pekerjaan' 				=> \Input::get('pekerjaan'),
				'jabatan' 					=> \Input::get('jabatan'),
				'penghasilan' 			=> \Input::get('penghasilan'),
				'kondisi_klien' 		=> \Input::get('kondisi_klien'),
				'dirujuk_oleh' 			=> \Input::get('dirujuk_oleh')
			]);

		// Log Activity
		// TODO: look at using 'Events' for logging instead
        $activity = \rifka\Activity::create([
				'user_id' => $user->id,
				'klien_id' => $klienBaru->klien_id,
				'action' => "Created Client"
				]);

		// Create new Address
		$provinsi = \Input::get('provinsi');
		if ($provinsi == 'Yogyakarta') {
			$kecamatan = \Input::get('kecamatan');
			$kabupaten = \Input::get('kabupaten');
		} else {
			$kecamatan = '';
			$kabupaten = \Input::get('provinsi');
		}

		$alamatBaru = \rifka\Alamat::create([
				'alamat' 	=> \Input::get('alamat'),
				'kecamatan' => $kecamatan,
				'kabupaten' => $kabupaten
			]);

		// Create new Client-Address
		$alamatKlienBaru = \rifka\AlamatKlien::create([
				'alamat_id' => $alamatBaru->alamat_id,
				'klien_id'	=> $klienBaru->klien_id
			]);
        
		if($returnPage == "klien") {
			return redirect('klien/'.$klienBaru->klien_id)
					->with('success', 'New client created.');
		}

		return redirect(404);
		
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
		$klien = Klien::findOrFail($id);
		$kasus2 = Klien::find($id)->klienKasus;
		$alamat2 = Klien::find($id)->alamatKlien;

		return view('klien.index', array(
			'show'		=> True,
			'klien' 	=> $klien,
			'kasus2'	=> $kasus2,
			'alamat2'	=> $alamat2));
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
		$klien = Klien::findOrFail($id);
		$kasus2 = Klien::find($id)->korbanKasus;

		return view('klien.index', array(
			'edit'		=> True,
			'klien' 	=> $klien,
			'kasus2'	=> $kasus2));
	}

	/**
	 * Update the Klien resource in the database.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//TODO: Ensure validation

		$user = Auth::user();
		$klien = Klien::findOrFail($id);
		$attributes = array_keys($klien->getAttributes());

		// Update Klien and Log Attribute Changes
		// TODO: look at using 'Events' for logging instead
		foreach($attributes as $attribute)
		{
			if(\Input::get($attribute) && $klien->$attribute != \Input::get($attribute))
			{
				$attributeChange = \rifka\AttributeChange::create([
					'user_id' => $user->id,
					'klien_id' => $klien->klien_id,
					'attribute_name' => $attribute,
					'old_attribute_value' => $klien->$attribute,
      		'new_attribute_value' => \Input::get($attribute)]);
				$klien->$attribute = \Input::get($attribute);
			}
		}
		$klien->save();
        
		return redirect()->route('klien.show', $id)
			->with('success', 'Klien file updated.');
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

}