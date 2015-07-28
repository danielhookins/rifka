<?php namespace rifka\Http\Controllers;

use rifka\Http\Requests;
use rifka\Http\Controllers\Controller;

use Illuminate\Http\Request;

class BentukKekerasanController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index($kasusID)
	{
		//
		$semuaBentuk = \rifka\BentukKekerasan::where('kasus_id', '=', $kasusID)->get();

		return $semuaBentuk;
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
	public function store($kasus_id)
	{
		//
		if($bentuk = \rifka\BentukKekerasan::create([
			'kasus_id' => $kasus_id,
			'emosional' => \Input::get('emosional'),
			'fisik' => \Input::get('fisik'),
			'ekonomi' => \Input::get('ekonomi'),
			'seksual' => \Input::get('seksual'),
			'sosial' => \Input::get('sosial'),
			'keterangan' => \Input::get('keterangan'),
		]))
		{
			return redirect()->route('kasus.show', [$kasus_id, '#bentuk-kekerasan']);
		}

		return 'Error, could not create new bentuk kekerasan';

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $kasusID
	 * @param  int  $bentukID
	 * @return Response
	 */
	public function show($kasus_id, $bentuk_id)
	{
		//
		$bentuk = \rifka\BentukKekerasan::find($bentuk_id);

		return $bentuk; 
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
	public function update($kasus_id, $bentuk_id)
	{
		// UPDATE BENTUK KEKERASAN
		if ($bentuk = \rifka\BentukKekerasan::find($bentuk_id))
		{
			$bentuk->emosional 
				= (\Input::get('emosional')) ? \Input::get('emosional') : null;
			$bentuk->fisik
				= (\Input::get('fisik')) ? \Input::get('fisik') : null;
			$bentuk->ekonomi
				= (\Input::get('ekonomi')) ? \Input::get('ekonomi') : null;
			$bentuk->seksual
				= (\Input::get('seksual')) ? \Input::get('seksual') : null;
			$bentuk->sosial
				= (\Input::get('sosial')) ? \Input::get('sosial') : null;
			$bentuk->keterangan
				= (\Input::get('keterangan')) ? \Input::get('keterangan') : null;
			$bentuk->save();

			return redirect()->route('kasus.show', [$kasus_id, "#bentuk-kekerasan"]);
		}

		return 'Error, could not update bentuk kekerasan.';

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
