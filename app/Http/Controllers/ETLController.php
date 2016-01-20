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

		ETLUtils::initIndex($rows, $model, $attributes);

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

		ETLUtils::initIndex($rows, $model, $attributes);

		return 'done';
	}

}
