<?php namespace rifka\Http\Controllers;

use rifka\Http\Requests;
use rifka\Http\Controllers\Controller;
use DB;
use rifka\KlienKasus;
use Illuminate\Http\Request;
use Session;
use rifka\Library\ExcelUtils;
use rifka\Library\UserUtils;
use rifka\Library\AlamatUtils;
use rifka\Library\Rifka;
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
		//$this->middleware('auth');
		
		// Only allow active users
		//$this->middleware('active');
	}

	//
	function index() 
	{

		return view('developer.index');
	}

	function test() 
	{
		var_dump(AlamatUtils::hasClients(1));
		return;
	}

	function postTest(Request $request)
	{
		return $request;
	}

}
