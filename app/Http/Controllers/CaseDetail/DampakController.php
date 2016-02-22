<?php namespace rifka\Http\Controllers\CaseDetail;

use rifka\Http\Controllers\CaseDetail\CaseDetailController;
use rifka\Dampak;

class DampakController extends CaseDetailController {

	/*
	|--------------------------------------------------------------------------
	| Impact (Dampak) Controller
	|--------------------------------------------------------------------------
	|
	| This controller handles dampak resource functionality.
	|
	*/

	/**
	 * Retrieve the resource object by it's ID.
	 *
	 * @param integer $id
	 * @return Dampak
	 */
	public function findById($id)
	{
		return Dampak::findOrFail($id);
	}

	/**
	 * Get the type of Resource.
	 *
	 * @return string
	 */
	public function getType()
	{
		return "dampak";
	}

	/**
	 * Get an array of the editable fields.
	 *
	 * @return Array
	 */
	public function getFields()
	{
		return ["jenis_dampak", "keterangan"];
	}

}
