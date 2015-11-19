<?php namespace rifka\Http\Controllers;

use rifka\Http\Controllers\CaseDetailController;
use rifka\FaktorPemicu;

class FaktorPemicuController extends CaseDetailController {

	// Find by Id
	public function findById($id)
	{
		return FaktorPemicu::findOrFail($id);
	}

	// Get the type
	public function getType()
	{
		return "faktorPemicu";
	}

	// Get an array of the editable fields
	public function getFields()
	{
		return ["jenis_pemicu", "keterangan"];
	}

}
