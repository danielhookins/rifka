<?php namespace rifka\Http\Controllers\CaseDetail;

use rifka\Http\Controllers\CaseDetail\CaseDetailController;
use rifka\Http\Requests;
use rifka\LitigasiPerdata;
use Illuminate\Http\Request;
use rifka\Library\InputUtils;
use rifka\Library\ResourceUtils;

class LitigasiPerdataController extends CaseDetailController {

  /*
  |--------------------------------------------------------------------------
  | Civil Litigation (litigasi perdata) Controller
  |--------------------------------------------------------------------------
  |
  | This controller handles functionality of litigasi perdata resources.
  |
  */

  /**
   * Show the form for creating a new litigasi perdata resource.
   *
   * @param Request $request
   * @param integer $kasus_id
   * @return Request
   */
	public function create(Request $request, $kasus_id)
	{
    $request->session()->flash("litigasiPerdata-baru", True);
    return redirect()->route('kasus.show', [$kasus_id, '#litigasi']);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  integer  $kasus_id
	 * @return Response
	 */
	public function store($kasus_id)
	{
		$resourceType = "LitigasiPerdata";
		$input = \Input::get();
		$fields = ["nomor_perkara", "pengadilan_wilayah_jenis", "pengadilan_wilayah_kabupaten", "nama_hakim", "cerai", "putusan_status", "diterima", "nafkah"];

		return ResourceUtils::storeResource($kasus_id, $resourceType, $input, $fields);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  Request  $request
	 * @param  integer  $kasus_id
	 * @param  integer  $litigasi_perdata_id
	 * @return Response
	 */
	public function edit(Request $request, $kasus_id, $litigasi_perdata_id)
	{
		$resource = LitigasiPerdata::findOrFail($litigasi_perdata_id);
		$request->session()->flash('edit-litigasiPerdata', True);
		$request->session()->flash('litigasiPerdata-active', $resource);

		return redirect()->route('kasus.show', [$kasus_id, '#litigasi']);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  integer  $kasus_id
	 * @param  integer  $litigasi_perdata_id
	 * @return Response
	 */
	public function update($kasus_id, $litigasi_perdata_id)
	{
		$resource = LitigasiPerdata::findOrFail($litigasi_perdata_id);
		$fields = ["nomor_perkara", "pengadilan_wilayah_jenis", "pengadilan_wilayah_kabupaten", "nama_hakim", "cerai", "putusan_status", "diterima", "nafkah"];
		$input = InputUtils::nullifyDefaults(\Input::get());
		
		try {
			ResourceUtils::updateResource($resource, $fields, $input);
			return redirect()->route('kasus.show', [$kasus_id, '#litigasi']);
		} catch (Exception $e) { return $e; }
	}

	/**
	 * Delete the specified resources from storage.
	 *
	 * @param  integer  $kasus_id
	 * @return Response
	 */
	public function deleteLitigasiPerdata2($kasus_id)
	{
		if($toDelete = \Input::get('toDelete')) {
			foreach($toDelete as $litigasi_perdata_id) {
				$deleted = LitigasiPerdata::where('litigasi_perdata_id', $litigasi_perdata_id)
						->where('kasus_id', $kasus_id)->delete();
			}
		}
		return redirect()->route('kasus.show', [$kasus_id, '#litigasi']);
	}

}
