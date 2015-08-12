<?php namespace rifka\Http\Controllers;

use rifka\Http\Requests;
use rifka\Http\Controllers\Controller;
use DB;
use rifka\KlienKasus;
use Illuminate\Http\Request;
use Session;

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

		Session::flash('test', true);

		dd(Session::all());

		return view('developer.testing-page');
	}

	function postTest(Request $request)
	{
		return $request;
	}

}
