<?php namespace rifka\Http\Controllers;

use rifka\Http\Controllers\Controller;
use rifka\Klien;
use rifka\Activity;
use rifka\AttributeChange;
use Illuminate\Http\Request;
use Auth;
use DB;
use rifka\KlienKasus;

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
		
		// Only allow active users
		$this->middleware('active');
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
		return view('klien.create');
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
				'klien_id' => $klienBaru->klien_id,
				'kecamatan' => $kecamatan,
				'kabupaten' => $kabupaten
			]);
        
		if($returnPage == "klien") {
			return redirect('klien/'.$klienBaru->klien_id)
					->with('success', 'New client created.');
		}

		return redirect('404');
	}

	/**
	 * Display the specified Client
	 * with associated cases and addresses
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		if($klien = Klien::find($id))
		{
			$kasus2 = Klien::find($id)->klienKasus;
			$alamat2 = Klien::find($id)->alamatKlien;

			return view('klien.show', array(
				'klien' 	=> $klien,
				'kasus2'	=> $kasus2,
				'alamat2'	=> $alamat2));
		}

		return redirect('404');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $klien_id
	 * @return Response
	 */
	public function edit(Request $request, $klien_id, $section = 'all')
	{
		if($section == 'kontak')
		{
			$request->session()->flash('edit-kontak', True);

			return redirect()->route('klien.show', [$klien_id, '#informasi-kontak']);
		}


		$klien = Klien::findOrFail($klien_id);
		$kasus2 = Klien::find($klien_id)->korbanKasus;

		return view('klien.edit', array(
			'klien' 	=> $klien,
			'kasus2'	=> $kasus2,
			'section' => $section));
	}

	/**
	 * Update the Klien resource in the database.
	 *
	 * @param  int  $klien_id
	 * @param  string $section The section of client data to update
	 * @return Response
	 */
	public function update($klien_id, $section = 'all')
	{

		/* 
		 * If the section is the Contact section 
		 * Update the telephone number and email address of the client
		 */
		if($section == "kontak")
		{
			$klien = Klien::findOrFail($klien_id);
			$klien->no_telp = \Input::get('no_telp');
			$klien->email = \Input::get('email');

			$klien->save();

			return redirect()->route('klien.show', [$klien_id, '#informasi-kontak']);
		}

		$user = Auth::user();
		$klien = Klien::findOrFail($klien_id);
		$attributes = array_keys($klien->getAttributes());

		// Update Klien and Log Attribute Changes
		// TODO: Fix Bug: If user clears an input it will not be updated.
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
				$klien->save();
			}
		}
        
		return redirect()->route('klien.show', $klien_id)
			->with('success', 'Klien file updated.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($klien_id)
	{
		$klien = Klien::findOrFail($klien_id);
		$klienKasus2 = KlienKasus::where('klien_id', $klien_id);
		$user = Auth::user();

		foreach ($klienKasus2->select('kasus_id')->get() as $klienKasus)
		{
			$kasus_id = $klienKasus->kasus_id; // Save id for logging
			
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
		
		$klien->delete();
		// TODO: Make sure all the associated things are deleted too
		// (eg. the clients address)

		// Log Activity
		// TODO: look at using 'Events' for logging instead
        $logDeleteClient = \rifka\Activity::create([
				'user_id' => $user->id,
				'klien_id' => $klien_id,
				'action' => "Deleted Client"
				]);

		return redirect()->route('home')
			->with('success', 'Klien #'.$klien_id.' has been deleted.');
	}

	/**
	 * Show the confirm delete dialog
	 * asking the user if they really want to delete?
	 */
	public function confirmDestroy($klien_id)
	{
		return view('klien.destroy', array('klien_id' => $klien_id));
	}

}