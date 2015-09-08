<?php namespace rifka\Http\Controllers;

use rifka\Http\Requests;
use rifka\Http\Controllers\Controller;
use rifka\FaktorPemicu;

use Illuminate\Http\Request;

class FaktorPemicuController extends Controller {

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

		// Grant access to counsellors, managers and developers
		$this->middleware('userType:Konselor');
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index($kasus_id)
	{
		//
		$faktorPemicu = FaktorPemicu::where('kasus_id', $kasus_id)->get();

		return $faktorPemicu;
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
		if($input = \Input::get())
		{
			
			$faktorPemicu = \rifka\FaktorPemicu::create([
				'kasus_id' 			=> $kasus_id,
				'jenis_pemicu' 	=> \Input::get('jenis_pemicu'),
				'keterangan'		=> \Input::get('keterangan')
				]);

			return redirect()->route('kasus.show', [$kasus_id, '#faktor-pemicu']);
		}

		return 'Error, could not get user input.';
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
	public function edit(Request $request, $kasus_id, $pemicu_id)
	{
		//
		$pemicu = FaktorPemicu::findOrFail($pemicu_id);

		$request->session()->flash('edit-pemicu', True);
		$request->session()->flash('pemicu-active', $pemicu);

		return redirect()->route('kasus.show', [$kasus_id, '#faktor-pemicu']);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($kasus_id, $pemicu_id)
	{
		//
		if($pemicu = FaktorPemicu::findOrFail($pemicu_id))
		{
			$pemicu->jenis_pemicu = \Input::get('jenis_pemicu');
			$pemicu->keterangan = \Input::get('keterangan');
			$pemicu->save();

			return redirect()->route('kasus.show', [$kasus_id, '#faktor-pemicu']);
		}
		
		return 'Error, could not update faktor pemicu.';
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

	public function deletePemicu2($kasus_id)
	{
		//
		if($toDelete = \Input::get('toDelete'))
		{
			foreach($toDelete as $pemicu_id)
			{
				$deleted = FaktorPemicu::where('pemicu_id', $pemicu_id)
						->where('kasus_id', $kasus_id)->delete();
			}
		}

		return redirect()->route('kasus.show', [$kasus_id, '#faktor-pemicu']);
	}

}
