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

		//
		return "test";
	
	}

	function postTest(Request $request)
	{
		return $request;
	}

}
