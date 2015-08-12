<?php namespace rifka\Http\Controllers;

use rifka\Http\Requests;
use rifka\Http\Controllers\Controller;

use Illuminate\Http\Request;

class AdministrasiController extends Controller {

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		// Only allow authenticated users
		$this->middleware('auth');
		
		// Only allow active users
		$this->middleware('active');
	}

	//
	function index() 
	{
		return view('administrasi.index');
	}

	//
	function newKlien() 
	{
		return view('administrasi.partials.new');
	}

	function searchKlien() 
	{
		return view('administrasi.partials.search');
	}
	
}
