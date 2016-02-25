<?php namespace rifka\Http\Controllers\CaseDetail;

use rifka\Http\Requests;
use rifka\Http\Controllers\CaseDetail\CaseDetailController;
use rifka\KegiatanLitigasi;
use Illuminate\Http\Request;
use rifka\Library\InputUtils;
use rifka\Library\ResourceUtils;

class KegiatanLitigasiController extends CaseDetailController {

	/**
	 * Store a newly created Kegian Litigasi in the database.
	 *
	 * @param $kasus_id
	 * @param $litigasi_id
	 * @return store the new Kegian Litigasi using ResourceUtils
	 */
	public function store($kasus_id, $litigasi_id)
	{
		// Set variables
		$resourceType = "KegiatanLitigasi";
		$input = \Input::get();
		$input["litigasi_id"] = $litigasi_id; // Ref. related litigation record
		$fields = ["litigasi_id", "tanggal", "kegiatan", "informasi"];

		return ResourceUtils::storeResource($kasus_id, $resourceType, $input, $fields);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  $kasus_id
	 * @param  $litigasi_id
	 * @param  $kegiatan_litigasi_id
	 * @return redirect to the show kasus page
	 */
	public function edit(Request $request, $kasus_id, $litigasi_id, $kegiatan_litigasi_id)
	{
		$kegiatan = KegiatanLitigasi::findOrFail($kegiatan_litigasi_id);

		$request->session()->flash('edit-kegiatan', True);
		$request->session()->flash('kegiatan-active', $kegiatan);

		return redirect()->route('kasus.show', [$kasus_id, '#kegiatanlitigasi']);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  $kasus_id
	 * @param  $litigasi_id
	 * @param  $kegiatan_id
	 * @return redirect to the show kasus page
	 */
	public function update($kasus_id, $litigasi_id, $kegiatan_id)
	{
		// Set variables
		$resource = KegiatanLitigasi::findOrFail($kegiatan_id);
		$fields = ["litigasi_id", "tanggal", "kegiatan", "informasi"];
		$input = InputUtils::nullifyDefaults(\Input::get());
		$input["litigasi_id"] = $litigasi_id; // Ref. related litigation record

		try {
			ResourceUtils::updateResource($resource, $fields, $input);

			// resource updated
			return redirect()->route('kasus.show', [$kasus_id, '#kegiatanlitigasi']);

		} Catch (Exception $e) {
			// Could not update resource
			return $e;
		}

	}

	/**
	 * Delete a Kegiatan Litigasi from the database
	 *
	 * @param  $kasus_id
	 * @param  $litigasi_id
	 * @return redirect to the show kasus page
	 */
	public function deleteKegiatan2($kasus_id, $litigasi_id)
	{
		if($toDelete = \Input::get('toDelete'))
		{
			foreach($toDelete as $kegiatan_litigasi_id)
			{
				$deleted = KegiatanLitigasi::where('kegiatan_litigasi_id', $kegiatan_litigasi_id)
						->where('litigasi_id', $litigasi_id)->delete();
			}
		}

		return redirect()->route('kasus.show', [$kasus_id, '#kegiatanlitigasi']);
	}

}
