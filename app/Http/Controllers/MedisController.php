<?php namespace rifka\Http\Controllers;

use rifka\Http\Requests;
use rifka\Http\Controllers\Controller;
use rifka\Medis;
use Illuminate\Http\Request;
use rifka\Library\InputUtils;
use rifka\Library\ResourceUtils;

class MedisController extends Controller {

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
        $request->session()->flash("medis-baru", True);

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
			$resourceType = "Medis";
			$input = \Input::get();
			$fields = ["tanggal", "jenis_medis", "keterangan"];

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
	public function edit(Request $request, $kasus_id, $medis_id)
	{
		$medis = Medis::findOrFail($medis_id);

		$request->session()->flash('edit-medis', True);
		$request->session()->flash('medis-active', $medis);

		return redirect()->route('kasus.show', [$kasus_id, '#medis']);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($kasus_id, $medis_id)
	{
		// Set variables
		$resource = Medis::findOrFail($medis_id);
		$fields = ["tanggal", "jenis_medis", "keterangan"];
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

	public function deleteMedis2($kasus_id)
	{
		if($toDelete = \Input::get('toDelete'))
		{
			foreach($toDelete as $medis_id)
			{
				$deleted = Medis::where('medis_id', $medis_id)
						->where('kasus_id', $kasus_id)->delete();
			}
		}

		return redirect()->route('kasus.show', [$kasus_id, '#layanan-diberikan']);
	}

}
