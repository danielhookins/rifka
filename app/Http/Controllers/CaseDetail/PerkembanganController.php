<?php namespace rifka\Http\Controllers\CaseDetail;

use rifka\Http\Controllers\CaseDetail\CaseDetailController;
use rifka\Perkembangan;

class PerkembanganController extends CaseDetailController {

	/*
	|--------------------------------------------------------------------------
	| Development (Perkembangan) Controller
	|--------------------------------------------------------------------------
	|
	| This controller handles perkembangan resource functionality.
	|
	*/

	/**
	 * Retrieve the resource object by it's ID.
	 *
	 * @param integer $id
	 * @return Perkembangan
	 */
	public function findById($id)
	{
		return Perkembangan::findOrFail($id);
	}

	/**
	 * Get the type of Resource.
	 *
	 * @return string
	 */
	public function getType()
	{
		return "perkembangan";
	}

	/**
	 * Get an array of the editable fields.
	 *
	 * @return Array
	 */
	public function getFields()
	{
		return ["tanggal", "intervensi", "kesimpulan", "kesepakatan", "deskripsi"];
	}

}
