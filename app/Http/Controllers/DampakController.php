<?php namespace rifka\Http\Controllers;

use rifka\Http\Requests;
use rifka\Http\Controllers\Controller;
use rifka\Dampak;
use Illuminate\Http\Request;

class DampakController extends Controller {

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
		
		$dampak = \rifka\Dampak::create([
			'kasus_id' 		=> $kasus_id,
			'jenis_dampak' 		=> \Input::get('jenis_dampak'),
			'keterangan' 	=> \Input::get('keterangan')
		]);

		return redirect()->route('kasus.show', [$kasus_id, '#dampak']);
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
	public function edit(Request $request, $kasus_id, $dampak_id)
	{
		$dampak = Dampak::findOrFail($dampak_id);

		$request->session()->flash('edit-dampak', True);
		$request->session()->flash('dampak-active', $dampak);

		return redirect()->route('kasus.show', [$kasus_id, '#dampak']);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($kasus_id, $dampak_id)
	{
		$dampak = Dampak::findOrFail($dampak_id);

		$dampak->jenis_dampak = \Input::get('jenis_dampak');
		$dampak->keterangan = \Input::get('keterangan');

		$dampak->save();

		return redirect()->route('kasus.show', [$kasus_id, '#dampak']);
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

	public function deleteDampak2($kasus_id)
	{
		if($toDelete = \Input::get('toDelete'))
		{
			foreach($toDelete as $dampak_id)
			{
				$deleted = Dampak::where('dampak_id', $dampak_id)
						->where('kasus_id', $kasus_id)->delete();
			}
		}

		return redirect()->route('kasus.show', [$kasus_id, '#dampak']);
	}

}
