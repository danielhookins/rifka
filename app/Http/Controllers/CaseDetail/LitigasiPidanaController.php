<?php namespace rifka\Http\Controllers\CaseDetail;

use rifka\Http\Controllers\CaseDetail\CaseDetailController;
use rifka\Http\Requests;
use rifka\LitigasiPidana;
use Illuminate\Http\Request;
use rifka\Library\InputUtils;
use rifka\Library\ResourceUtils;

class LitigasiPidanaController extends CaseDetailController {

  /*
  |--------------------------------------------------------------------------
  | Criminal Litigation (litigasi pidana) Controller
  |--------------------------------------------------------------------------
  |
  | This controller handles functionality of litigasi pidana resources.
  |
  */

  /**
   * Show the form for creating a new litigasi pidana resource.
   *
   * @param Request $request
   * @param integer $kasus_id
   * @return Request
   */
	public function create(Request $request, $kasus_id)
	{
    $request->session()->flash("litigasiPidana-baru", True);
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
		$resourceType = "LitigasiPidana";
		$input = \Input::get();
		$fields = ["pidana_jenis", "undang_digunakan", 
			"kepolisian_wilayah", "nama_penyidik", "pengadilan_wilayah", 
			"nomor_perkara", "nama_hakim", "nama_jaksa", "tuntutan", "putusan"];

		return ResourceUtils::storeResource($kasus_id, $resourceType, $input, $fields);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  Request  $request
	 * @param  integer  $kasus_id
	 * @param  integer  $litigasi_pidana_id
	 * @return Response
	 */
	public function edit(Request $request, $kasus_id, $litigasi_pidana_id)
	{
		$resource = LitigasiPidana::findOrFail($litigasi_pidana_id);
		$request->session()->flash('edit-litigasiPidana', True);
		$request->session()->flash('litigasiPidana-active', $resource);

		return redirect()->route('kasus.show', [$kasus_id, '#litigasi']);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  integer  $kasus_id
	 * @param  integer  $litigasi_perdata_id
	 * @return Response
	 */
	public function update($kasus_id, $litigasi_pidana_id)
	{
		$resource = LitigasiPidana::findOrFail($litigasi_pidana_id);
		$fields = ["pidana_jenis", "undang_digunakan", 
			"kepolisian_wilayah", "nama_penyidik", "pengadilan_wilayah", 
			"nomor_perkara", "nama_hakim", "nama_jaksa", "tuntutan", "putusan"];
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
	public function deleteLitigasiPidana2($kasus_id)
	{
		if($toDelete = \Input::get('toDelete')) {
			foreach($toDelete as $litigasi_pidana_id) {
				$deleted = LitigasiPidana::where('litigasi_pidana_id', $litigasi_pidana_id)
					->where('kasus_id', $kasus_id)->delete();
			}
		}
		return redirect()->route('kasus.show', [$kasus_id, '#litigasi']);
	}

}
