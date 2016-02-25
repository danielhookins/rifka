<?php namespace rifka\Http\Controllers\CaseDetail;

use Illuminate\Http\Request;
use rifka\Http\Requests;
use rifka\Http\Controllers\CaseDetail\CaseDetailController;
use rifka\Library\InputUtils;
use rifka\Library\ResourceUtils;
use rifka\KonsPsikologi;

class KonsPsikologiController extends CaseDetailController {

	/*
	|--------------------------------------------------------------------------
	| Psychological Counselling (Kons Psikologi) Controller
	|--------------------------------------------------------------------------
	|
	| This controller handles kons psikologi resource functionality.
	|
	*/

	/**
	 * Show the form for creating a new resource.
	 *
	 * @param  Request  $request
	 * @param  integer  $kasus_id
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
	 * @param  integer  $kasus_id
	 * @return Response
	 */
	public function store($kasus_id)
	{
		$resourceType = "KonsPsikologi";
		$input = \Input::get();
		$fields = ["tanggal", "keterangan"];
		return ResourceUtils::storeResource($kasus_id, $resourceType, $input, $fields);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  Request  $request
	 * @param  integer  $kasus_id
	 * @param  integer  $kons_psikologi_id
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
	 * @param  integer  $kasus_id
	 * @param  integer  $kons_psikologi_id
	 * @return Response
	 */
	public function update($kasus_id, $kons_psikologi_id)
	{
		$resource = KonsPsikologi::findOrFail($kons_psikologi_id);
		$fields = ["tanggal", "keterangan"];
		$input = InputUtils::nullifyDefaults(\Input::get());
		try {
			ResourceUtils::updateResource($resource, $fields, $input);
			return redirect()->route('kasus.show', [$kasus_id, '#layanan-diberikan']);
		} Catch (Exception $e) { return $e; }
	}

	/**
	 * Delete the specified resources from storage.
	 *
	 * @param  integer  $kasus_id
	 * @return Response
	 */
	public function deleteKonsPsikologi2($kasus_id)
	{
		if($toDelete = \Input::get('toDelete')) {
			foreach($toDelete as $kons_psikologi_id) {
				$deleted = KonsPsikologi::where('kons_psikologi_id', $kons_psikologi_id)
						->where('kasus_id', $kasus_id)->delete();
			}
		}
		return redirect()->route('kasus.show', [$kasus_id, '#layanan-diberikan']);
	}

}
