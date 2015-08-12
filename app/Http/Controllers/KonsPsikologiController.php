<?php namespace rifka\Http\Controllers;

use rifka\Http\Requests;
use rifka\Http\Controllers\Controller;
use rifka\KonsPsikologi;
use Illuminate\Http\Request;

class KonsPsikologiController extends Controller {

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		// Only allow authenticated users
		$this->middleware('auth');
		
		// Only allow active users
		$this->middleware('active');
	}

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
        $request->session()->flash("kons_psikologi-baru", True);

        return redirect()->route('kasus.show', [$kasus_id, '#layanan-diberikan']);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request, $kasus_id)
	{
		$konsPsikologi = \rifka\KonsPsikologi::create([
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
	public function edit(Request $request, $kasus_id, $kons_psikologi_id)
	{
		$konsPsikologi = KonsPsikologi::findOrFail($kons_psikologi_id);

		$request->session()->flash('edit-kons_psikologi', True);
		$request->session()->flash('kons_psikologi-active', $konsPsikologi);

		return redirect()->route('kasus.show', [$kasus_id, '#kons-psikologi']);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($kasus_id, $kons_psikologi_id)
	{
		$konsPsikologi = KonsPsikologi::findOrFail($kons_psikologi_id);
		$konsPsikologi->tanggal = \Input::get('tanggal');
		$konsPsikologi->keterangan = \Input::get('keterangan');

		$konsPsikologi->save();

		return redirect()->route('kasus.show', [$kasus_id, '#kons-psikologi']);
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

	public function deleteKonsPsikologi2($kasus_id)
	{
		if($toDelete = \Input::get('toDelete'))
		{
			foreach($toDelete as $kons_psikologi_id)
			{
				$deleted = KonsPsikologi::where('kons_psikologi_id', $kons_psikologi_id)
						->where('kasus_id', $kasus_id)->delete();
			}
		}

		return redirect()->route('kasus.show', [$kasus_id, '#layanan-diberikan']);
	}

}
