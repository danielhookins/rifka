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

		$rows = ETLUtils::getIndexSearch();

		$model = "IndexSearch";
		$attributes = array(
							'klien_id',
		          'nama_klien',
		          'kelamin',
		          'email',
		          'no_telp',
		          'kasus_id',
		          'jenis_kasus',
		          'tahun', 
		          'alamat_id',
		          'kabupaten',
		          'kecamatan', 
		          'alamat',
		          'arsip_id',
		          'no_reg',
		          'media');

		ETLUtils::initTable($rows, $model, $attributes);

		return 'done';

		return "test";
	
	}

	function postTest(Request $request)
	{
		return $request;
	}

}
