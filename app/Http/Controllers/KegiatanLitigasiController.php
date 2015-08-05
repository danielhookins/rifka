<?php namespace rifka\Http\Controllers;

use rifka\Http\Requests;
use rifka\Http\Controllers\Controller;
use rifka\KegiatanLitigasi;
use Illuminate\Http\Request;

class KegiatanLitigasiController extends Controller {

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
	public function store(Request $request, $kasus_id, $litigasi_id)
	{
		$kegiatan = \rifka\KegiatanLitigasi::create([
			'litigasi_id' 	=> $litigasi_id,
			'tanggal' 		=> \Input::get('tanggal'),
			'kegiatan' 		=> \Input::get('kegiatan'),
			'informasi'  	=> \Input::get('informasi')
		]);

		return redirect()->route('kasus.show', [$kasus_id, '#kegiatan-litigasi']);
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
	public function edit(Request $request, $kasus_id, $litigasi_id, $kegiatan_litigasi_id)
	{
		$kegiatan = KegiatanLitigasi::findOrFail($kegiatan_litigasi_id);

		$request->session()->flash('edit-kegiatan', True);
		$request->session()->flash('kegiatan-active', $kegiatan);

		return redirect()->route('kasus.show', [$kasus_id, '#kegiatan-litigasi']);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($kasus_id, $litigasi_id, $kegiatan_litigasi_id)
	{
		$kegiatan = KegiatanLitigasi::findOrFail($kegiatan_litigasi_id);
		$kegiatan->tanggal = \Input::get('tanggal');
		$kegiatan->kegiatan = \Input::get('kegiatan');
		$kegiatan->informasi = \Input::get('informasi');

		$kegiatan->save();

		return redirect()->route('kasus.show', [$kasus_id, '#kegiatan-litigasi']);
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

	public function deleteKegiatan2($kasus_id, $litigasi_id)
	{
		if($toDelete = \Input::get('toDelete'))
		{
			foreach($toDelete as $kegiatan_litigasi_id)
			{
				$deleted = KegiatanLitigasi::where('kegiatan_litigasi_id', $kegiatan_litigasi_id)
						->where('litigasi_id', $litigasi_id)->delete();
			}
		}

		return redirect()->route('kasus.show', [$kasus_id, '#kegiatan-litigasi']);
	}

}
