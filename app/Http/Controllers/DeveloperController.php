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

		$klienKasus = KlienKasus::where('klien_id', (int) "264")
						->where('kasus_id', (int) "4939")
          	->update(['jenis_klien' => 'Korban']);

		dd($klienKasus);
	}

}
