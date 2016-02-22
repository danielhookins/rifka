<?php namespace rifka\Http\Controllers\CaseDetail;

use rifka\Http\Controllers\CaseDetail\CaseDetailController;
use rifka\Arsip;

class ArsipController extends CaseDetailController {

	/*
	|--------------------------------------------------------------------------
	| Physical Record (Arsip) Controller
	|--------------------------------------------------------------------------
	|
	| This controller handles arsip resource functionality.
	|
	*/

	/**
	 * Retrieve the resource object by it's ID.
	 *
	 * @param integer $id
	 * @return Arsip
	 */
	public function findById($id)
	{
		return Arsip::findOrFail($id);
	}

	/**
	 * Get the type of Resource.
	 *
	 * @return string
	 */
	public function getType()
	{
		return "arsip";
	}

	/**
	 * Get an array of the editable fields.
	 *
	 * @return Array
	 */
	public function getFields()
	{
		return ["no_reg", "media", "lokasi"];
	}

}
