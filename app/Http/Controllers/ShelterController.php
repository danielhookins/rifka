<?php namespace rifka\Http\Controllers;

use rifka\Http\Requests;
use rifka\Http\Controllers\Controller;
use rifka\Shelter;
use Illuminate\Http\Request;
use rifka\Library\InputUtils;
use rifka\Library\ResourceUtils;

class ShelterController extends Controller {

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
        $request->session()->flash("shelter-baru", True);

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
	$resourceType = "Shelter";
	$input = \Input::get();
	$fields = ["mulai_tanggal", "sampai_tanggal", "keterangan"];

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
	public function edit(Request $request, $kasus_id, $shelter_id)
	{
		$shelter = Shelter::findOrFail($shelter_id);

		$request->session()->flash('edit-shelter', True);
		$request->session()->flash('shelter-active', $shelter);

		return redirect()->route('kasus.show', [$kasus_id, '#shelter']);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($kasus_id, $shelter_id)
	{
		// Set variables
		$resource = Shelter::findOrFail($shelter_id);
		$fields = ["mulai_tanggal", "sampai_tanggal", "keterangan"];
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

	public function deleteShelter2($kasus_id)
	{
		if($toDelete = \Input::get('toDelete'))
		{
			foreach($toDelete as $shelter_id)
			{
				$deleted = Shelter::where('shelter_id', $shelter_id)
						->where('kasus_id', $kasus_id)->delete();
			}
		}

		return redirect()->route('kasus.show', [$kasus_id, '#layanan-diberikan']);
	}

}
