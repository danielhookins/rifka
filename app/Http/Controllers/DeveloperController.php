<?php namespace rifka\Http\Controllers;

use rifka\Http\Requests;
use rifka\Http\Controllers\Controller;
use DB;
use rifka\KlienKasus;
use Illuminate\Http\Request;

class DeveloperController extends Controller {

	//
	function index() 
	{

		return view('developer.index');
	}

	function test() 
	{

		return view('developer.testing-page');
	}

	function postTest(Request $request)
	{
		return $request;
	}

}
