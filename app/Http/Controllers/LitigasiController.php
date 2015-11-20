<?php namespace rifka\Http\Controllers;

use rifka\Http\Controllers\CaseDetailController;
use rifka\Litigasi;

class LitigasiController extends CaseDetailController {

	// Find by Id
	public function findById($id)
	{
		return Litigasi::findOrFail($id);
	}

	// Get the type
	public function getType()
	{
		return "litigasi";
	}

	// Get an array of the editable fields
	public function getFields()
	{
		return ["jenis_litigasi", 
						"undang_digunakan",
						"kepolisian_wilayah",
						"nama_penyidik",
						"nomor_perkara",
						"pengadilan_wilayah",
						"nama_hakim",
						"nama_jaksa",
						"tuntutan",
						"putusan"];
	}

}
