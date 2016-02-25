<?php namespace rifka\Http\Controllers\CaseDetail;

use rifka\Http\Controllers\CaseDetail\CaseDetailController;
use rifka\Http\Requests;
use rifka\Medis;
use Illuminate\Http\Request;
use rifka\Library\InputUtils;
use rifka\Library\ResourceUtils;

class MedisController extends CaseDetailController {

	/*
	|--------------------------------------------------------------------------
	| Medical (Medis) Controller
	|--------------------------------------------------------------------------
	|
	| This controller handles medis resource functionality.
	|
	*/

	/**
	 * Retrieve the resource object by it's ID.
	 *
	 * @param integer $id
	 * @return Medis
	 */
	public function findById($id)
	{
		return Medis::findOrFail($id);
	}

	/**
	 * Get the type of Resource.
	 *
	 * @return string
	 */
	public function getType()
	{
		return "medis";
	}

	/**
	 * Get an array of the editable fields.
	 *
	 * @return Array
	 */
	public function getFields()
	{
		return ["tanggal", "jenis_medis", "keterangan"];
	}

}
