<?php namespace rifka\Http\Controllers\CaseDetail;

use rifka\Http\Controllers\Controller;
use rifka\Http\Requests;
use Illuminate\Http\Request;
use rifka\Library\InputUtils;
use rifka\Library\ResourceUtils;

class CaseDetailController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Case Detail Controller
	|--------------------------------------------------------------------------
	|
	| This base controller handles resource functionality.
	| It is extended by more specific case detail controllers.
	|
	*/

	/**
	 * Persist a new specific resource from user inputs.
	 *
	 * @param integer $kasus_id
	 * @return Response
	 */
	public function store($kasus_id)
	{
		try {
			return ResourceUtils::storeResource(
			$kasus_id, 
			$this->getType(), 
			\Input::get(), 
			$this->getFields());
		} catch(Exception $e) {return $e;}
	}

	/**
	 * Show the form to edit a specified case detail.
	 *
 	 * @param Request $request
	 * @param integer $kasus_id
 	 * @param integer $detail_id
	 * @return Response
	 */
	public function edit(Request $request, $kasus_id, $detail_id)
	{
		$request->session()->flash('edit-'.$this->getType(), True);
		$request->session()->flash($this->getType().'-active', $this->findById($detail_id));
		return redirect()
			->route('kasus.show', [$kasus_id, '#'.strtolower($this->getType())]);
	}

	/**
	 * Update a specified case detail.
	 *
	 * @param integer $kasus_id
 	 * @param integer $detail_id
	 * @return Response
	 */
	public function update($kasus_id, $detail_id)
	{
		$resource = $this->findById($detail_id);
		$fields = $this->getFields();
		$type = strtolower($this->getType());

		try {
			ResourceUtils::updateResource($resource, $fields, \Input::get());
			return redirect()->route('kasus.show', [$kasus_id, '#'.$type]);
		} catch (Exception $e) { return $e; }
	}

	/**
	 * Delete the selected case details from the database.
	 *
	 * @param integer $kasus_id
	 * @param string $model
	 * @param integer $primaryKey
	 * @return Response
	 */
	public function deleteSelectedDetails($kasus_id, $model, $primaryKey = null)
	{
		$primaryKey = ($primaryKey == null) ? $model."_id" : $primaryKey;
		$resourceRef = 'rifka\\'.ucfirst($model);

		try {
			foreach(\Input::get('toDelete') as $detail_id) {
				$resourceRef::where($primaryKey, $detail_id)
					->where('kasus_id', $kasus_id)->delete();
			}
		} catch (Exception $e) { return $e; }

		return redirect()->route('kasus.show', [$kasus_id, '#'.strtolower($model)]);
	}

}
