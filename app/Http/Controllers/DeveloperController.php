<?php namespace rifka\Http\Controllers;

use rifka\Http\Requests;
use rifka\Http\Controllers\Controller;
use Illuminate\Http\Request;
use rifka\Library\ETLUtils;

class DeveloperController extends Controller {

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		// Only allow authenticated users
		$this->middleware('auth');
		
		// Only allow active users
		$this->middleware('active');

		// Grant access to only developers
		$this->middleware('userType:Developer');
	}

	//
	function index() 
	{
		return view('developer.index');
	}

	function test() 
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

		ETLUtils::initIndex($rows, $model, $attributes);

		return 'done';
	
	}

	function postTest(Request $request)
	{
		return $request;
	}

}
