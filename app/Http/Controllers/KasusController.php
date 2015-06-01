<?php namespace rifka\Http\Controllers;

use rifka\Http\Requests;
use rifka\Http\Controllers\Controller;

use Illuminate\Http\Request;

class KasusController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
		$semuaKasus = \rifka\Kasus::paginate(15);

		if ($semuaKasus->count()) {
			$attributes = $semuaKasus->first()->toArray();
		} else {
			$attributes = array();
		}
		

		return view('kasus.index', array(
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
		$kasus = \rifka\Kasus::findOrFail($id);
		$klien2 = \rifka\Kasus::find($id)->korbanKasus;

		return view('kasus.index', array(
									'show'		=> True,
									'kasus' 	=> $kasus,
									'klien2'	=> $klien2
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

}
