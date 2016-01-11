<?php namespace rifka\Http\Controllers;

use rifka\Http\Requests;
use rifka\Http\Controllers\Controller;
use DB;
use rifka\KlienKasus;
use rifka\DWKabJenisUsia;
use Illuminate\Http\Request;
use Session;
use rifka\Library\ExcelUtils;
use rifka\Library\UserUtils;
use rifka\Library\AlamatUtils;
use rifka\Library\Rifka;
use rifka\Library\LaporanUtils;
use rifka\Library\KasusUtils;
use rifka\Library\ETLUtils;
use Excel;
use rifka\Klien;

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
		
		return 'test';
	
	}

	function postTest(Request $request)
	{
		return $request;
	}

}
