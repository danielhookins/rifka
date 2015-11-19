<?php namespace rifka\Http\Controllers;

use rifka\Http\Controllers\CaseDetailController;
use rifka\UpayaDilakukan;

class UpayaDilakukanController extends CaseDetailController {

	// Find by Id
	public function findById($id)
	{
		return UpayaDilakukan::findOrFail($id);
	}

	// Get the type
	public function getType()
	{
		return "upayaDilakukan";
	}

	// Get an array of the editable fields
	public function getFields()
	{
		return ["jenis_upaya", "hasil"];
	}

}
