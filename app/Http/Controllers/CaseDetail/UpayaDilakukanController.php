<?php namespace rifka\Http\Controllers\CaseDetail;

use rifka\Http\Controllers\CaseDetail\CaseDetailController;
use rifka\UpayaDilakukan;

class UpayaDilakukanController extends CaseDetailController {

	/*
	|--------------------------------------------------------------------------
	| Efforts Tried (Upaya Dilakukan) Controller
	|--------------------------------------------------------------------------
	|
	| This controller handles upaya dilakukan resource functionality.
	|
	*/

	/**
	 * Retrieve the resource object by it's ID.
	 *
	 * @param integer $id
	 * @return UpayaDilakukan
	 */
	public function findById($id)
	{
		return UpayaDilakukan::findOrFail($id);
	}

	/**
	 * Get the type of Resource.
	 *
	 * @return string
	 */
	public function getType()
	{
		return "upayaDilakukan";
	}

	/**
	 * Get an array of the editable fields.
	 *
	 * @return Array
	 */
	public function getFields()
	{
		return ["jenis_upaya", "hasil"];
	}

}
