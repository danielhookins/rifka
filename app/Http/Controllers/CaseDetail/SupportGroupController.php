<?php namespace rifka\Http\Controllers\CaseDetail;

use rifka\Http\Controllers\CaseDetail\CaseDetailController;
use rifka\Http\Requests;
use rifka\SupportGroup;
use Illuminate\Http\Request;
use rifka\Library\InputUtils;
use rifka\Library\ResourceUtils;

class SupportGroupController extends CaseDetailController {

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create(Request $request, $kasus_id)
	{
    $request->session()->flash("supportGroup-baru", True);
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
		$resourceType = "SupportGroup";
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
	public function edit(Request $request, $kasus_id, $supportGroup_id)
	{
		$konsHukum = SupportGroup::findOrFail($supportGroup_id);

		$request->session()->flash('edit-supportGroup', True);
		$request->session()->flash('supportGroup-active', $konsHukum);

		return redirect()->route('kasus.show', [$kasus_id, '#supportGroup']);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($kasus_id, $supportgroup_id)
	{
		// Set variables
		$resource = SupportGroup::findOrFail($supportgroup_id);
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

	public function deleteSupportGroup2($kasus_id)
	{
		if($toDelete = \Input::get('toDelete'))
		{
			foreach($toDelete as $support_group_id)
			{
				$deleted = SupportGroup::where('support_group_id', $support_group_id)
						->where('kasus_id', $kasus_id)->delete();
			}
		}

		return redirect()->route('kasus.show', [$kasus_id, '#layanan-diberikan']);
	}

}
