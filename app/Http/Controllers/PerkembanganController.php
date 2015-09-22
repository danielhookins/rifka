<?php namespace rifka\Http\Controllers;

use rifka\Http\Requests;
use rifka\Http\Controllers\Controller;
use Illuminate\Http\Request;
use rifka\Perkembangan;
use rifka\Library\InputUtils;
use rifka\Library\ResourceUtils;

class PerkembanganController extends Controller {

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
	public function store($kasus_id)
	{
		// Set variables
		$resourceType = "Perkembangan";
		$input = \Input::get();
		$fields = ["tanggal", "intervensi", "kesimpulan", "kesepakatan"];

		return ResourceUtils::storeResource($kasus_id, $resourceType, $input, $fields);
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
		// Set variables
		$resource = Perkembangan::findOrFail($perkembangan_id);
		$fields = ["tanggal", "intervensi", "kesimpulan", "kesepakatan"];
		$input = InputUtils::nullifyDefaults(\Input::get());
		
		try {
			ResourceUtils::updateResource($resource, $fields, $input);

			// resource updated
			return redirect()->route('kasus.show', [$kasus_id, '#perkembangan']);

		} Catch (Exception $e) {
			// Could not update resource
			return $e;
		}

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
