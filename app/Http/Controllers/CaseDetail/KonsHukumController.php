<?php namespace rifka\Http\Controllers\CaseDetail;

use Illuminate\Http\Request;
use rifka\Http\Requests;
use rifka\Http\Controllers\CaseDetail\CaseDetailController;
use rifka\KonsHukum;
use rifka\Library\InputUtils;
use rifka\Library\ResourceUtils;

class KonsHukumController extends CaseDetailController {

	/*
	|--------------------------------------------------------------------------
	| Legal Counselling (Kons Hukum) Controller
	|--------------------------------------------------------------------------
	|
	| This controller handles kons hukum resource functionality.
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
    $request->session()->flash("kons_hukum-baru", True);
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
		$resourceType = "KonsHukum";
		$input = \Input::get();
		$fields = ["tanggal", "keterangan"];
		return ResourceUtils::storeResource($kasus_id, $resourceType, $input, $fields);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  Request  $request
	 * @param  integer  $kasus_id
	 * @param  integer  $kons_hukum_id
	 * @return Response
	 */
	public function edit(Request $request, $kasus_id, $kons_hukum_id)
	{
		$konsHukum = KonsHukum::findOrFail($kons_hukum_id);
		$request->session()->flash('edit-kons_hukum', True);
		$request->session()->flash('kons_hukum-active', $konsHukum);

		return redirect()->route('kasus.show', [$kasus_id, '#kons-hukum']);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  integer  $kasus_id
	 * @param  integer  $kons_hukum_id
	 * @return Response
	 */
	public function update($kasus_id, $kons_hukum_id)
	{
		$resource = KonsHukum::findOrFail($kons_hukum_id);
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
	public function deleteKonsHukum2($kasus_id)
	{
		if($toDelete = \Input::get('toDelete')) {
			foreach($toDelete as $kons_hukum_id) {
				$deleted = KonsHukum::where('kons_hukum_id', $kons_hukum_id)
						->where('kasus_id', $kasus_id)->delete();}
		}
		return redirect()->route('kasus.show', [$kasus_id, '#layanan-diberikan']);
	}

}
