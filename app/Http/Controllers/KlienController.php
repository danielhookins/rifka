<?php namespace rifka\Http\Controllers;

use rifka\Http\Requests;
use rifka\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KlienController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
		$semuaKlien = \rifka\Klien::orderBy('klien_id', 'DESC')->paginate(15);

		return view('klien.index', array(
										'search'	 => True,
										'list'		 => True,
										'semuaKlien' => $semuaKlien
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
		return view('klien.index', array(
								'create' => True
								));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//TODO: Ensure validation and CSRF

		// KLIEN BARU
		$klienBaru = \rifka\Klien::create([
				'nama_klien' 		=> \Input::get('nama_klien'),
				'kelamin'			=> \Input::get('kelamin'),
				'tanggal_lahir' 	=> \Input::get('tanggal_lahir'),
				'agama' 			=> \Input::get('agama'),
				'status_perkawinan' => \Input::get('status_perkawinan'),
				'no_telp' 			=> \Input::get('no_telp'),

				'email' => \Input::get('email'),

				'jumlah_anak'		=> \Input::get('jumlah_anak'),
				'jumlah_tanggungan' => \Input::get('tanggungan'),

				'pekerjaan' 	=> \Input::get('pekerjaan'),
				'jabatan' 		=> \Input::get('jabatan'),
				'penghasilan' 	=> \Input::get('penghasilan'),

				'kondisi_klien' => \Input::get('kondisi_klien'),
				'dirujuk_oleh' 	=> \Input::get('dirujuk_oleh')
			]);

		// ALAMAT BARU
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

		// ALAMAT-KLIEN BARU
		$alamatKlienBaru = \rifka\AlamatKlien::create([
				'alamat_id' => $alamatBaru->alamat_id,
				'klien_id'	=> $klienBaru->klien_id
			]);
        
		return redirect('klien/'.$klienBaru->klien_id)
					->with('success', 'New client created.');
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
		$klien = \rifka\Klien::findOrFail($id);
		$kasus2 = \rifka\Klien::find($id)->klienKasus;
		$alamat2 = \rifka\Klien::find($id)->alamatKlien;

		return view('klien.index', array(
									'show'		=> True,
									'klien' 	=> $klien,
									'kasus2'	=> $kasus2,
									'alamat2'	=> $alamat2
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
		$klien = \rifka\Klien::findOrFail($id);
		$kasus2 = \rifka\Klien::find($id)->korbanKasus;

		return view('klien.index', array(
									'edit'		=> True,
									'klien' 	=> $klien,
									'kasus2'	=> $kasus2
									));
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
		$results = \rifka\Klien::search($query)->get();
        
    	return view('klien.searchResults', array(
    								'query'		=> $query,
									'results'	=> $results
									));
	}

}
