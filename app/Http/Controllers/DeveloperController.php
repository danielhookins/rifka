<?php namespace rifka\Http\Controllers;

use rifka\Http\Requests;
use rifka\Http\Controllers\Controller;
use DB;
use rifka\KlienKasus;
use Illuminate\Http\Request;
use Session;
use rifka\Library\ExcelUtils;
use Excel;
use rifka\Klien;

class DeveloperController extends Controller {

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		// Only allow authenticated users
		//$this->middleware('auth');
		
		// Only allow active users
		//$this->middleware('active');
	}

	//
	function index() 
	{

		return view('developer.index');
	}

	function test() 
	{
		
		return Common::exportClientInfoXLS(1);

		return Excel::create('Filename', function($excel) {

			  $excel->sheet('Sheetname', function ($sheet) 
			  {

			    // first row styling and writing content
			    $sheet->mergeCells('A1:W1');
			    $sheet->row(1, function ($row) 
			    {
			        $row->setFontFamily('Arial');
			        $row->setFontSize(18);
			    });

			    $sheet->row(1, array('Client Information'));

			    // second row styling and writing content
			    $sheet->row(2, function ($row) 
			    {
			        // call cell manipulation methods
			        $row->setFontFamily('Arial');
			        $row->setFontSize(16);
			        $row->setFontWeight('bold');
			    });

			    $sheet->row(2, array('Exported from Database'));

			    // getting data to display - in my case only one record
			    $clients = Klien::get()->toArray();

			    // setting column names for data - you can of course set it manually
			    $sheet->appendRow(array_keys($users[0])); // column names

			    // getting last row number (the one we already filled and setting it to bold
			    $sheet->row($sheet->getHighestRow(), function ($row) 
			    {
			        $row->setFontWeight('bold');
			    });

			    // putting users data as next rows
			    foreach ($clients as $client) 
			    {
			      $sheet->appendRow($client);
			  	}

				});

		})->export('xls');

	}

	function postTest(Request $request)
	{
		return $request;
	}

}
