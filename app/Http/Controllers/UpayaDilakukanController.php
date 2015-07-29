<?php namespace rifka\Http\Controllers;

use rifka\Http\Requests;
use rifka\Http\Controllers\Controller;
use rifka\UpayaDilakukan;

use Illuminate\Http\Request;

class UpayaDilakukanController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
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
	public function store(Request $request, $kasus_id)
	{
		
		$upaya = \rifka\UpayaDilakukan::create([
			'kasus_id' 		=> $kasus_id,
			'jenis_upaya' 		=> \Input::get('jenis_upaya'),
			'hasil' 	=> \Input::get('hasil')
		]);

		return redirect()->route('kasus.show', [$kasus_id, '#upaya-dilakukan']);

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
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit(Request $request, $kasus_id, $upaya_id)
	{
		$upaya = UpayaDilakukan::findOrFail($upaya_id);

		$request->session()->flash('edit-upaya', True);
		$request->session()->flash('upaya-active', $upaya);

		return redirect()->route('kasus.show', [$kasus_id, '#upaya-dilakukan']);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($kasus_id, $upaya_id)
	{
		$upaya = UpayaDilakukan::findOrFail($upaya_id);

		$upaya->jenis_upaya = \Input::get('jenis_upaya');
		$upaya->hasil = \Input::get('hasil');

		$upaya->save();

		return redirect()->route('kasus.show', [$kasus_id, '#upaya-dilakukan']);
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

	public function deleteUpaya2($kasus_id)
	{
		if($toDelete = \Input::get('toDelete'))
		{
			foreach($toDelete as $upaya_id)
			{
				$deleted = UpayaDilakukan::where('upaya_id', $upaya_id)
						->where('kasus_id', $kasus_id)->delete();
			}
		}

		return redirect()->route('kasus.show', [$kasus_id, '#upaya-dilakukan']);
	}

}
