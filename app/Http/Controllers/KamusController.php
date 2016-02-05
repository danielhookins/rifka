<?php namespace rifka\Http\Controllers;

use rifka\Http\Requests;
use rifka\Http\Controllers\Controller;

use Illuminate\Http\Request;

class KamusController extends Controller {
	
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth');
		$this->middleware('active');
		$this->middleware('userType:Developer');
	}
	
	//
	function index() 
	{

		return view('kamus.index', [
			'tables'		=> \rifka\Kamus_table::all(),
			'attributes' 	=> \rifka\Kamus_attribute::all(),
			'tabletypes'	=> \rifka\Kamus_table::select('type')->distinct()->get()
			]);
	}

}
