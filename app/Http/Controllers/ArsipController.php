<?php namespace rifka\Http\Controllers;

use rifka\Http\Requests;
use rifka\Http\Controllers\Controller;
use rifka\Arsip;
use Illuminate\Http\Request;

class ArsipController extends Controller {

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
		$arsip = \rifka\Arsip::create([
			'kasus_id' 		=> $kasus_id,
			'no_reg' 		=> \Input::get('no_reg'),
			'media' 		=> \Input::get('media'),
			'lokasi' 	=> \Input::get('lokasi')
		]);

		return redirect()->route('kasus.show', [$kasus_id, '#arsip']);
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
	public function edit(Request $request, $kasus_id, $arsip_id)
	{
		$arsip = Arsip::findOrFail($arsip_id);

		$request->session()->flash('edit-arsip', True);
		$request->session()->flash('arsip-active', $arsip);

		return redirect()->route('kasus.show', [$kasus_id, '#arsip']);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($kasus_id, $arsip_id)
	{
		$arsip = Arsip::findOrFail($arsip_id);
		$arsip->no_reg = \Input::get('no_reg');
		$arsip->media = \Input::get('media');
		$arsip->lokasi = \Input::get('lokasi');

		$arsip->save();

		return redirect()->route('kasus.show', [$kasus_id, '#arsip']);
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
	
	public function search()
	{
		$query = \Input::get('searchQuery');
		$results = \rifka\Arsip::search($query)->get();
        
    	return view('arsip.searchResults', array(
				'query'		=> $query,
				'results'	=> $results));
	}

	public function deleteArsip2($kasus_id)
	{
		if($toDelete = \Input::get('toDelete'))
		{
			foreach($toDelete as $arsip_id)
			{
				$deleted = Arsip::where('arsip_id', $arsip_id)
						->where('kasus_id', $kasus_id)->delete();
			}
		}

		return redirect()->route('kasus.show', [$kasus_id, '#arsip']);
	}

}
