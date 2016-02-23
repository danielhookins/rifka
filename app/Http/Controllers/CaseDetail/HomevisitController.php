<?php namespace rifka\Http\Controllers\CaseDetail;

use rifka\Http\Controllers\CaseDetail\CaseDetailController;
use rifka\Homevisit;

class HomevisitController extends CaseDetailController {

	/*
	|--------------------------------------------------------------------------
	| Home visit Controller
	|--------------------------------------------------------------------------
	|
	| This controller handles home visit resource functionality.
	|
	*/

	/**
	 * Retrieve the resource object by it's ID.
	 *
	 * @param integer $id
	 * @return Homevisit
	 */
	public function findById($id)
	{
		return Homevisit::findOrFail($id);
	}

	/**
	 * Get the type of Resource.
	 *
	 * @return string
	 */
	public function getType()
	{
		return "homevisit";
	}

	/**
	 * Get an array of the editable fields.
	 *
	 * @return Array
	 */
	public function getFields()
	{
		return ["tanggal", "keterangan"];
	}

}
