<?php namespace rifka\Http\Controllers;

use rifka\Http\Requests;
use rifka\Http\Controllers\Controller;
use rifka\Mediasi;
use Illuminate\Http\Request;
use rifka\Library\InputUtils;
use rifka\Library\ResourceUtils;

class MediasiController extends Controller {

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
        $request->session()->flash("mediasi-baru", True);

        return redirect()->route('kasus.show', [$kasus_id, '#layanan-diberikan']);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store($kasus_id)
	{
		// Set variables
		$resourceType = "Mediasi";
		$input = \Input::get();
		$fields = ["tanggal", "hasil", "keterangan"];

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
	public function edit(Request $request, $kasus_id, $mediasi_id)
	{
		$mediasi = Mediasi::findOrFail($mediasi_id);

		$request->session()->flash('edit-mediasi', True);
		$request->session()->flash('mediasi-active', $mediasi);

		return redirect()->route('kasus.show', [$kasus_id, '#mediasi']);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($kasus_id, $mediasi_id)
	{
		// Set variables
		$resource = Mediasi::findOrFail($mediasi_id);
		$fields = ["tanggal", "hasil", "keterangan"];
		$input = InputUtils::nullifyDefaults(\Input::get());
		
		try {
			ResourceUtils::updateResource($resource, $fields, $input);

			// resource updated
			return redirect()->route('kasus.show', [$kasus_id, '#layanan-diberikan']);

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
		//
	}

	public function deleteMediasi2($kasus_id)
	{
		if($toDelete = \Input::get('toDelete'))
		{
			foreach($toDelete as $mediasi_id)
			{
				$deleted = Mediasi::where('mediasi_id', $mediasi_id)
						->where('kasus_id', $kasus_id)->delete();
			}
		}

		return redirect()->route('kasus.show', [$kasus_id, '#layanan-diberikan']);
	}

}
