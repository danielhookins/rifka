<?php namespace rifka\Http\Controllers\CaseDetail;

use rifka\Http\Controllers\CaseDetail\CaseDetailController;
use rifka\LayananDibutuhkan;

class LayananDibutuhkanController extends CaseDetailController {

	/*
	|--------------------------------------------------------------------------
	| Services Required (Layanan Dibutuhkan) Controller
	|--------------------------------------------------------------------------
	|
	| This controller handles layanan dibutuhkan resource functionality.
	|
	*/

	/**
	 * Retrieve the resource object by it's ID.
	 *
	 * @param integer $id
	 * @return LayananDibutuhkan
	 */
	public function findById($id)
	{
		return LayananDibutuhkan::findOrFail($id);
	}

	/**
	 * Get the type of Resource.
	 *
	 * @return string
	 */
	public function getType()
	{
		return "layananDibutuhkan";
	}

	/**
	 * Get an array of the editable fields.
	 *
	 * @return Array
	 */
	public function getFields()
	{
		return ["jenis_layanan", "status"];
	}

}
