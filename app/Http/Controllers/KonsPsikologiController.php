<?php namespace rifka\Http\Controllers;

use rifka\Http\Requests;
use rifka\Http\Controllers\Controller;
use rifka\KonsPsikologi;
use Illuminate\Http\Request;
use rifka\Library\InputUtils;
use rifka\Library\ResourceUtils;

class KonsPsikologiController extends Controller {

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
	public function store($kasus_id)
	{
		// Set variables
		$resourceType = "KonsPsikologi";
		$input = \Input::get();
		$fields = ["tanggal", "keterangan"];

		return ResourceUtils::storeResource($kasus_id, $resourceType, $input, $fields);
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
		// Set variables
		$resource = KonsPsikologi::findOrFail($kons_psikologi_id);
		$fields = ["tanggal", "keterangan"];
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
