<?php namespace rifka\Http\Controllers;

use rifka\Http\Requests;
use rifka\Http\Controllers\Controller;
use rifka\LayananDibutuhkan;
use Illuminate\Http\Request;

class LayananDibutuhkanController extends Controller {

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
		$layanan = \rifka\LayananDibutuhkan::create([
			'kasus_id' 			=> $kasus_id,
			'jenis_layanan' => \Input::get('jenis_layanan'),
			'status' 				=> \Input::get('status')
		]);

		return redirect()->route('kasus.show', [$kasus_id, '#layanan-dibutuhkan']);
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
	public function edit(Request $request, $kasus_id, $layanan_dbth_id)
	{
		$layanan = LayananDibutuhkan::findOrFail($layanan_dbth_id);

		$request->session()->flash('edit-layanan-dibutuhkan', True);
		$request->session()->flash('layanan-dbth-active', $layanan);

		return redirect()->route('kasus.show', [$kasus_id, '#layanan-dibutuhkan']);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($kasus_id, $layanan_dbth_id)
	{
		$layanan = LayananDibutuhkan::findOrFail($layanan_dbth_id);

		$layanan->jenis_layanan = \Input::get('jenis_layanan');
		$layanan->status = \Input::get('status');

		$layanan->save();

		return redirect()->route('kasus.show', [$kasus_id, '#layanan-dibutuhkan']);
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

	public function deleteLayananDbth2($kasus_id)
	{
		if($toDelete = \Input::get('toDelete'))
		{
			foreach($toDelete as $layanan_id)
			{
				$deleted = LayananDibutuhkan::where('layanan_dbth_id', $layanan_id)
						->where('kasus_id', $kasus_id)->delete();
			}
		}

		return redirect()->route('kasus.show', [$kasus_id, '#layanan-dibutuhkan']);
	}
}
