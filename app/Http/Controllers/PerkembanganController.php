<?php namespace rifka\Http\Controllers;

use rifka\Http\Requests;
use rifka\Http\Controllers\Controller;
use Illuminate\Http\Request;
use rifka\Perkembangan;

class PerkembanganController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index($kasus_id)
	{
		return redirect('404');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create($kasus_id)
	{
		return redirect('404');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request, $kasus_id)
	{
		//TODO: Ensure validation
		//TODO: Log activity as done by: $user = Auth::user();

		// Store a new development for the case
		$perkembangan = \rifka\Perkembangan::create([
			'kasus_id' 		=> $kasus_id,
			'tanggal' 		=> \Input::get('tanggal'),
			'intervensi' 	=> \Input::get('intervensi'),
			'kesimpulan'  => \Input::get('kesimpulan'),
			'kesepakatan' => \Input::get('kesepakatan')
		]);

		return redirect()->route('kasus.show', [$kasus_id, '#perkembangan']);

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($kasus_id, $perkembangan_id)
	{

		return redirect('404');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit(Request $request, $kasus_id, $perkembangan_id)
	{
		$perkembangan = Perkembangan::findOrFail($perkembangan_id);

		$request->session()->flash('edit-perkembangan', True);
		$request->session()->flash('perkembangan-active', $perkembangan);

		return redirect()->route('kasus.show', [$kasus_id, '#perkembangan']);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($kasus_id, $perkembangan_id)
	{

		$perkembangan = Perkembangan::findOrFail($perkembangan_id);
		$perkembangan->tanggal = \Input::get('tanggal');
		$perkembangan->intervensi = \Input::get('intervensi');
		$perkembangan->kesimpulan = \Input::get('kesimpulan');
		$perkembangan->kesepakatan = \Input::get('kesepakatan');

		$perkembangan->save();

		return redirect()->route('kasus.show', [$kasus_id, '#perkembangan']);

	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($perkembangan_id)
	{
		//
	}

	public function deletePerkembangan2($kasus_id)
	{
		if($toDelete = \Input::get('toDelete'))
		{
			foreach($toDelete as $perkembangan_id)
			{
				$deleted = Perkembangan::where('perkembangan_id', $perkembangan_id)
						->where('kasus_id', $kasus_id)->delete();
			}
		}

		return redirect()->route('kasus.show', [$kasus_id, '#perkembangan']);
	}

}
