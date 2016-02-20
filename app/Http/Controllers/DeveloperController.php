<?php namespace rifka\Http\Controllers;

use rifka\Http\Requests;
use rifka\Http\Controllers\Controller;
use Illuminate\Http\Request;
use rifka\Library\ETLUtils;
use rifka\DWKorbanKasus;
use rifka\KlienKasus;
use DB;

class DeveloperController extends Controller {

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth');
		$this->middleware('active');
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
