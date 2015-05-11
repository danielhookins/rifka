<?php namespace rifka\Http\Controllers;

use rifka\Http\Requests;
use rifka\Http\Controllers\Controller;

use Illuminate\Http\Request;

class TentangController extends Controller {

	//
	function index() 
	{
		return view('tentang.index');
	}

}
