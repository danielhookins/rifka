<?php namespace rifka\Http\Controllers;

use rifka\Http\Controllers\CaseDetailController;
use rifka\Perkembangan;

class PerkembanganController extends CaseDetailController {

	// Find by Id
	public function findById($id)
	{
		return Perkembangan::findOrFail($id);
	}

	// Get the type
	public function getType()
	{
		return "perkembangan";
	}

	// Get an array of the editable fields
	public function getFields()
	{
		return ["tanggal", "intervensi", "kesimpulan", "kesepakatan"];
	}

}
