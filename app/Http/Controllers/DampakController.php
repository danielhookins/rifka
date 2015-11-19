<?php namespace rifka\Http\Controllers;

use rifka\Http\Controllers\CaseDetailController;
use rifka\Dampak;

class DampakController extends CaseDetailController {

	// Find by Id
	public function findById($id)
	{
		return Dampak::findOrFail($id);
	}

	// Get the type
	public function getType()
	{
		return "dampak";
	}

	// Get an array of the editable fields
	public function getFields()
	{
		return ["jenis_dampak", "keterangan"];
	}

}
