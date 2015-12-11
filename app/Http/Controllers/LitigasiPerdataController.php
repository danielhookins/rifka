<?php namespace rifka\Http\Controllers;

use rifka\Http\Requests;
use rifka\Http\Controllers\Controller;
use rifka\LitigasiPerdata;
use Illuminate\Http\Request;
use rifka\Library\InputUtils;
use rifka\Library\ResourceUtils;

class LitigasiPerdataController extends Controller {

	/**
	 * Create a new controller instance.
	 */
	public function __construct()
	{
		// Only allow authenticated users
		$this->middleware('auth');
		
		// Only allow active users
		$this->middleware('active');

		// Grant access to counsellors, managers and developers
		$this->middleware('userType:Konselor');
	}

	/**
	 * Show the form for creating a new resource.
	 */
	public function create(Request $request, $kasus_id)
	{
        $request->session()->flash("litigasiPerdata-baru", True);

        return redirect()->route('kasus.show', [$kasus_id, '#litigasi']);
	}

	/**
	 * Store a newly created resource in storage.
	 */
	public function store($kasus_id)
	{
		// Set variables
		$resourceType = "LitigasiPerdata";
		$input = \Input::get();
		$fields = ["nomor_perkara", "pengadilan_wilayah_jenis", "pengadilan_wilayah_kabupaten", "nama_hakim", "cerai", "putusan_status", "diterima", "nafkah"];

		return ResourceUtils::storeResource($kasus_id, $resourceType, $input, $fields);
	}

	/**
	 * Show the form for editing the specified resource.
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
	 */
	public function update($kasus_id, $litigasi_perdata_id)
	{
		// Set variables
		$resource = LitigasiPerdata::findOrFail($litigasi_perdata_id);
		$fields = ["nomor_perkara", "pengadilan_wilayah_jenis", "pengadilan_wilayah_kabupaten", "nama_hakim", "cerai", "putusan_status", "diterima", "nafkah"];
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
	public function deleteLitigasiPerdata2($kasus_id)
	{
		if($toDelete = \Input::get('toDelete'))
		{
			foreach($toDelete as $litigasi_perdata_id)
			{
				$deleted = LitigasiPerdata::where('litigasi_perdata_id', $litigasi_perdata_id)
						->where('kasus_id', $kasus_id)->delete();
			}
		}
		
		return redirect()->route('kasus.show', [$kasus_id, '#litigasi']);
	}

}