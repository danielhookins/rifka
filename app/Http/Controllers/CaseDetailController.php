<?php namespace rifka\Http\Controllers;

use rifka\Http\Controllers\Controller;
use rifka\Http\Requests;
use Illuminate\Http\Request;
use rifka\Library\InputUtils;
use rifka\Library\ResourceUtils;

class CaseDetailController extends Controller {
	
	/**
	 * Create a new case detail instance.
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
	 * Store a newly created case detail in the database.
	 */
	public function store($kasus_id)
	{
		// Set variables
		$resourceType = $this->getType();
		$input = \Input::get();
		$fields = $this->getFields();

		return ResourceUtils::storeResource($kasus_id, $resourceType, $input, $fields);
	}

	/**
	 * Show the form for editing the specified case detail.
	 */
	public function edit(Request $request, $kasus_id, $detail_id)
	{
		// Set variables
		$detail = $this->findById($detail_id);
		$type = $this->getType();

		$request->session()->flash('edit-'.$type, True);
		$request->session()->flash($type.'-active', $detail);

		return redirect()->route('kasus.show', [$kasus_id, '#'.strtolower($type)]);
	}

	/**
	 * Update the specified case detail in the database.
	 */
	public function update($kasus_id, $detail_id)
	{
		// Set variables
		$resource = $this->findById($detail_id);
		$fields = $this->getFields();
		$input = InputUtils::nullifyDefaults(\Input::get());
		$type = strtolower($this->getType());
		
		try {
			ResourceUtils::updateResource($resource, $fields, $input);

			// resource updated
			return redirect()->route('kasus.show', [$kasus_id, '#'.$type]);

		} Catch (Exception $e) {
			// Could not update resource
			return $e;
		}

	}

	/**
	 * Delete the selected case details from the database.
	 *
	 * @param $kasus_id The id of the case from which to delete details
	 * @param $model The Model
	 * @param $primaryKey The primary key field to use when deletign
	 * @return redirect to the show kasus page
	 */
	public function deleteSelectedDetails($kasus_id, $model, $primaryKey = null)
	{
		// Set variables
		$primaryKey = ($primaryKey == null) ? $model."_id" : $primaryKey;
		$resourceRef = 'rifka\\'.ucfirst($model);

		if($toDelete = \Input::get('toDelete'))
		{
			foreach($toDelete as $detail_id)
			{
				$resourceRef::where($primaryKey, $detail_id)
					->where('kasus_id', $kasus_id)->delete();
			}
		}

		return redirect()->route('kasus.show', [$kasus_id, '#'.strtolower($model)]);
	}

}