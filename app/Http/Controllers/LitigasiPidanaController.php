<?php namespace rifka\Http\Controllers;

use rifka\Http\Requests;
use rifka\Http\Controllers\Controller;
use rifka\LitigasiPidana;
use Illuminate\Http\Request;
use rifka\Library\InputUtils;
use rifka\Library\ResourceUtils;

class LitigasiPidanaController extends Controller {

	/**
	 * Show the form for creating a new resource.
	 */
	public function create(Request $request, $kasus_id)
	{
        $request->session()->flash("litigasiPidana-baru", True);

        return redirect()->route('kasus.show', [$kasus_id, '#litigasi']);
	}

	/**
	 * Store a newly created resource in storage.
	 */
	public function store($kasus_id)
	{
		// Set variables
		$resourceType = "LitigasiPidana";
		$input = \Input::get();
		$fields = ["pidana_jenis", "undang_digunakan", 
			"kepolisian_wilayah", "nama_penyidik", "pengadilan_wilayah", 
			"nomor_perkara", "nama_hakim", "nama_jaksa", "tuntutan", "putusan"];

		return ResourceUtils::storeResource($kasus_id, $resourceType, $input, $fields);
	}

	/**
	 * Show the form for editing the specified resource.
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
	 */
	public function update($kasus_id, $litigasi_pidana_id)
	{
		// Set variables
		$resource = LitigasiPidana::findOrFail($litigasi_pidana_id);
		$fields = ["pidana_jenis", "undang_digunakan", 
			"kepolisian_wilayah", "nama_penyidik", "pengadilan_wilayah", 
			"nomor_perkara", "nama_hakim", "nama_jaksa", "tuntutan", "putusan"];
		$input = InputUtils::nullifyDefaults(\Input::get());
		
		try {
			ResourceUtils::updateResource($resource, $fields, $input);

			// resource updated
			return redirect()->route('kasus.show', [$kasus_id, '#litigasi']);

		} Catch (Exception $e) {
			// Could not update resource
			return $e;
		}

	}

	/**
	 * Delete multiple selected resources
	 */
	public function deleteLitigasiPidana2($kasus_id)
	{
		if($toDelete = \Input::get('toDelete'))
		{
			foreach($toDelete as $litigasi_pidana_id)
			{
				$deleted = LitigasiPidana::where('litigasi_pidana_id', $litigasi_pidana_id)
						->where('kasus_id', $kasus_id)->delete();
			}
		}
		
		return redirect()->route('kasus.show', [$kasus_id, '#litigasi']);
	}

}