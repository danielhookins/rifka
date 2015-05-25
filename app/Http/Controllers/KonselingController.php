<?php namespace rifka\Http\Controllers;

use rifka\Http\Requests;
use rifka\Http\Controllers\Controller;

use Illuminate\Http\Request;

class KonselingController extends Controller {

	//
	function index() 
	{
		return view('konseling.index');
	}
}
