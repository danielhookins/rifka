<?php namespace rifka\Http\Controllers;

use rifka\Http\Requests;
use rifka\Http\Controllers\Controller;

use Illuminate\Http\Request;

class AdministrasiController extends Controller {

	//
	function index() 
	{
		return view('administrasi.index');
	}
}
