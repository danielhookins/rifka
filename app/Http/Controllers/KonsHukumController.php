<?php namespace rifka\Http\Controllers;

use rifka\Http\Requests;
use rifka\Http\Controllers\Controller;
use rifka\KonsHukum;
use Illuminate\Http\Request;

class KonsHukumController extends Controller {

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
	public function create(Request $request, $kasus_id)
	{
        $request->session()->flash("kons_hukum-baru", True);

        return redirect()->route('kasus.show', [$kasus_id, '#layanan-diberikan']);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request, $kasus_id)
	{
		$konsHukum = \rifka\KonsHukum::create([
			'kasus_id' 		=> $kasus_id,
			'tanggal' 		=> \Input::get('tanggal'),
			'keterangan' 	=> \Input::get('keterangan')
		]);

		return redirect()->route('kasus.show', [$kasus_id, '#layanan-diberikan']);
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
	public function edit(Request $request, $kasus_id, $kons_hukum_id)
	{
		$konsHukum = KonsHukum::findOrFail($kons_hukum_id);

		$request->session()->flash('edit-kons_hukum', True);
		$request->session()->flash('kons_hukum-active', $konsHukum);

		return redirect()->route('kasus.show', [$kasus_id, '#kons-hukum']);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($kasus_id, $kons_hukum_id)
	{
		$konsHukum = KonsHukum::findOrFail($kons_hukum_id);
		$konsHukum->tanggal = \Input::get('tanggal');
		$konsHukum->keterangan = \Input::get('keterangan');

		$konsHukum->save();

		return redirect()->route('kasus.show', [$kasus_id, '#kons-hukum']);
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

	public function deleteKonsHukum2($kasus_id)
	{
		if($toDelete = \Input::get('toDelete'))
		{
			foreach($toDelete as $kons_hukum_id)
			{
				$deleted = KonsHukum::where('kons_hukum_id', $kons_hukum_id)
						->where('kasus_id', $kasus_id)->delete();
			}
		}

		return redirect()->route('kasus.show', [$kasus_id, '#layanan-diberikan']);
	}

}
