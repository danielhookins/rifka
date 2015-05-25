<?php namespace rifka\Http\Controllers;

use rifka\Http\Requests;
use rifka\Http\Controllers\Controller;

use Illuminate\Http\Request;

class MensProgramController extends Controller {

	//
	function index() 
	{
		return view('mens.index');
	}
}
