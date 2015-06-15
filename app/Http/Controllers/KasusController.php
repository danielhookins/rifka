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
		} else {
			$attributes = array();
		}
		

		return view('kasus.index', array(
										'search'		 => True,
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

}
