<?php namespace rifka\Http\Controllers;

use rifka\Http\Requests;
use rifka\Http\Controllers\Controller;
use rifka\KegiatanLitigasi;
use Illuminate\Http\Request;
use rifka\Library\InputUtils;
use rifka\Library\ResourceUtils;

class KegiatanLitigasiController extends Controller {

	/**
	 * Create a new controller instance.
	 *
	 * @return void
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
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		// not used
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		// not used
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
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
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		// not used
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
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
	 * @param  int  $id
	 * @return Response
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
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		// not used
	}

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
