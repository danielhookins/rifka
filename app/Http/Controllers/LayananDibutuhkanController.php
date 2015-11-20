<?php namespace rifka\Http\Controllers;

use rifka\Http\Controllers\CaseDetailController;
use rifka\LayananDibutuhkan;

class LayananDibutuhkanController extends CaseDetailController {

	// Find by Id
	public function findById($id)
	{
		return LayananDibutuhkan::findOrFail($id);
	}

	// Get the type
	public function getType()
	{
		return "layananDibutuhkan";
	}

	// Get an array of the editable fields
	public function getFields()
	{
		return ["jenis_layanan", "status"];
	}

}
