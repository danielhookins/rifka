<?php namespace rifka\Http\Controllers\CaseDetail;

use rifka\Http\Controllers\CaseDetail\CaseDetailController;
use rifka\FaktorPemicu;

class FaktorPemicuController extends CaseDetailController {

	/*
	|--------------------------------------------------------------------------
	| Trigger Factor (Faktor Pemicu) Controller
	|--------------------------------------------------------------------------
	|
	| This controller handles faktor pemicu resource functionality.
	|
	*/

	/**
	 * Retrieve the resource object by it's ID.
	 *
	 * @param integer $id
	 * @return FaktorPemicu
	 */
	public function findById($id)
	{
		return FaktorPemicu::findOrFail($id);
	}

	/**
	 * Get the type of Resource.
	 *
	 * @return string
	 */
	public function getType()
	{
		return "faktorPemicu";
	}

	/**
	 * Get an array of the editable fields.
	 *
	 * @return Array
	 */
	public function getFields()
	{
		return ["jenis_pemicu", "keterangan"];
	}

}
