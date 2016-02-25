<?php namespace rifka\Http\Controllers\CaseDetail;

use rifka\Http\Controllers\CaseDetail\CaseDetailController;
use rifka\Http\Requests;
use rifka\Mediasi;
use Illuminate\Http\Request;
use rifka\Library\InputUtils;
use rifka\Library\ResourceUtils;

class MediasiController extends CaseDetailController {

	/*
	|--------------------------------------------------------------------------
	| Mediasi (Mediation) Controller
	|--------------------------------------------------------------------------
	|
	| This controller handles mediasi resource functionality.
	|
	*/

	/**
	 * Retrieve the resource object by it's ID.
	 *
	 * @param integer $id
	 * @return Mediasi
	 */
	public function findById($id)
	{
		return Mediasi::findOrFail($id);
	}

	/**
	 * Get the type of Resource.
	 *
	 * @return string
	 */
	public function getType()
	{
		return "mediasi";
	}

	/**
	 * Get an array of the editable fields.
	 *
	 * @return Array
	 */
	public function getFields()
	{
		return ["tanggal", "hasil", "keterangan"];
	}

}
