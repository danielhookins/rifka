<?php namespace rifka\Http\Controllers;

use rifka\Http\Requests;
use rifka\Http\Controllers\Controller;
use rifka\Litigasi;
use Illuminate\Http\Request;

class LitigasiController extends Controller {

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
		$litigasi = \rifka\Litigasi::create([
			'kasus_id' 		=> $kasus_id,
			'jenis_litigasi' 		=> \Input::get('jenis_litigasi'),
			'undang_digunakan' 	=> \Input::get('undang_digunakan'),
			'kepolisian_wilayah'  => \Input::get('kepolisian_wilayah'),
			'nama_penyidik' => \Input::get('nama_penyidik'),
			'pengadilan_wilayah' => \Input::get('pengadilan_wilayah'),
			'nama_hakim' => \Input::get('nama_hakim'),
			'nama_jaksa' => \Input::get('nama_jaksa'),
			'tuntutan' => \Input::get('tuntutan'),
			'putusan' => \Input::get('putusan')
		]);

		return redirect()->route('kasus.show', [$kasus_id, '#litigasi']);
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
	public function edit(Request $request, $kasus_id, $litigasi_id)
	{
		$litigasi = Litigasi::findOrFail($litigasi_id);

		$request->session()->flash('edit-litigasi', True);
		$request->session()->flash('litigasi-active', $litigasi);

		return redirect()->route('kasus.show', [$kasus_id, '#litigasi']);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($kasus_id, $litigasi_id)
	{
		$litigasi = Litigasi::findOrFail($litigasi_id);
		$litigasi->jenis_litigasi = \Input::get('jenis_litigasi');
		$litigasi->undang_digunakan = \Input::get('undang_digunakan');
		$litigasi->kepolisian_wilayah = \Input::get('kepolisian_wilayah');
		$litigasi->nama_penyidik = \Input::get('nama_penyidik');
		$litigasi->pengadilan_wilayah = \Input::get('pengadilan_wilayah');
		$litigasi->nama_hakim = \Input::get('nama_hakim');
		$litigasi->nama_jaksa = \Input::get('nama_jaksa');
		$litigasi->tuntutan = \Input::get('tuntutan');
		$litigasi->putusan = \Input::get('putusan');

		$litigasi->save();

		return redirect()->route('kasus.show', [$kasus_id, '#litigasi']);
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
