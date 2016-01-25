<?php namespace rifka\Http\Controllers;

use rifka\Http\Requests;
use rifka\Http\Controllers\Controller;
use Illuminate\Http\Request;
use rifka\Library\ETLUtils;

class ETLController extends Controller {

	function initIndexAlamatKlien() 
	{
		$rows = ETLUtils::getAlamatKlien();

		$model = "IndexAlamat";
		$attributes = array(
							"klien_id",
							"alamat",
							"kecamatan",
							"kabupaten",
							"provinsi");

		ETLUtils::initTable($rows, $model, $attributes);

		return 'done';
	}

	function initIndexKlien() 
	{
		$rows = ETLUtils::getKlien();

		$model = "IndexKlien";
		$attributes = array(
							"klien_id",
							"nama_klien",
							"email",
							"no_telp");

		ETLUtils::initTable($rows, $model, $attributes);

		return 'done';
	}

	function initDWKorbanKasus() 
	{

		$rows = ETLUtils::getKorbanKasus();

		$model = "DWKorbanKasus";
		$attributes = array(
							'kasus_id',
							'klien_id',
							'nama_klien',
							'agama',
		          'pendidikan',
		          'pekerjaan',
		          'penghasilan',
		          'status_perkawinan',
		          'kondisi_klien',
							'kabupaten',
							'jenis_kasus',
							'hubungan',
							'harapan_korban',
							'usia',
							'tahun');

		ETLUtils::initTable($rows, $model, $attributes);

		return 'done';
	
	}

}
