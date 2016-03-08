<?php namespace rifka\Http\Controllers;

use Illuminate\Http\Request;
use rifka\Http\Requests;
use rifka\Http\Controllers\Controller;

class DeveloperController extends Controller {

  /*
  |--------------------------------------------------------------------------
  | Developer Controller
  |--------------------------------------------------------------------------
  |
  | This is the controller for the developer.
  |
  */

	function index() 
	{
		return view('developer.index');
	}

	function test() 
	{
    return \rifka\Library\ETLUtils::setKabupatenKasusFromDW();

    return 'test';
	}

	function postTest(Request $request)
	{
		return $request;
	}

}
