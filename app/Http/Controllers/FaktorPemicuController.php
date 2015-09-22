<?php namespace rifka\Http\Controllers;

use rifka\Http\Requests;
use rifka\Http\Controllers\Controller;
use rifka\FaktorPemicu;
use rifka\Library\ResourceUtils;
use rifka\Library\InputUtils;
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
		// Not used
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store($kasus_id)
	{
		// Set variables
		$resourceType = "FaktorPemicu";
		$input = \Input::get();
		$fields = ["jenis_pemicu", "keterangan"];

		return ResourceUtils::storeResource($kasus_id, $resourceType, $input, $fields);
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

		return redirect()->route('kasus.show', [$kasus_id, '#faktorpemicu']);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($kasus_id, $pemicu_id)
	{

		// Set variables
		$resource = FaktorPemicu::findOrFail($pemicu_id);
		$fields = ["jenis_pemicu", "keterangan"];
		$input = InputUtils::nullifyDefaults(\Input::get());
		
		try {
			ResourceUtils::updateResource($resource, $fields, $input);

			// resource updated
			return redirect()->route('kasus.show', [$kasus_id, '#faktorpemicu']);

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
	public function destroy($id)
	{
		// Not used
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

		return redirect()->route('kasus.show', [$kasus_id, '#faktorpemicu']);
	}

}
