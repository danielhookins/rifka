<?php namespace rifka\Http\Controllers\CaseDetail;

use rifka\Http\Controllers\CaseDetail\CaseDetailController;
use rifka\Http\Requests;
use rifka\Rujukan;
use Illuminate\Http\Request;
use rifka\Library\InputUtils;
use rifka\Library\ResourceUtils;

class RujukanController extends CaseDetailController {

	/*
	|--------------------------------------------------------------------------
	| Reference (Rujukan) Controller
	|--------------------------------------------------------------------------
	|
	| This controller handles rujukan resource functionality.
	|
	*/

	/**
	 * Retrieve the resource object by it's ID.
	 *
	 * @param integer $id
	 * @return Rujukan
	 */
	public function findById($id)
	{
		return Rujukan::findOrFail($id);
	}

	/**
	 * Get the type of Resource.
	 *
	 * @return string
	 */
	public function getType()
	{
		return "rujukan";
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
