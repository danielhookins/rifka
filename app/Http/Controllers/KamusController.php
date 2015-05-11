<?php namespace rifka\Http\Controllers;

use rifka\Http\Requests;
use rifka\Http\Controllers\Controller;

use Illuminate\Http\Request;

class KamusController extends Controller {

	//
	function index() 
	{

		return view('kamus.index', [
			'tables'		=> \rifka\Kamus_table::all(),
			'attributes' 	=> \rifka\Kamus_attribute::all()
			]);
	}

}
