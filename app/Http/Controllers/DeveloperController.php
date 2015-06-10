<?php namespace rifka\Http\Controllers;

use rifka\Http\Requests;
use rifka\Http\Controllers\Controller;

use Illuminate\Http\Request;

class DeveloperController extends Controller {

	//
	function index() 
	{

		return view('developer.index');
	}

}
