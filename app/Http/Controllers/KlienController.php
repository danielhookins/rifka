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
		$semuaKlien = \rifka\Klien::paginate(15);
		
		if ($semuaKlien->count()) {
			$attributes = $semuaKlien->first()->toArray();
		} else {
			$attributes = array();
		}

		return view('klien.index', array(
										'list'		 => True,
										'semuaKlien' => $semuaKlien,
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
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
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

}
