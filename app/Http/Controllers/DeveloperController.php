<?php namespace rifka\Http\Controllers;

use rifka\Http\Requests;
use rifka\Http\Controllers\Controller;
use DB;
use rifka\KlienKasus;
use Illuminate\Http\Request;
use Session;
use rifka\Library\ExcelUtils;
use rifka\Library\UserUtils;
use rifka\Library\AlamatUtils;
use rifka\Library\Rifka;
use rifka\Library\LaporanUtils;
use rifka\Library\KasusUtils;
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
		
		$tableData = array();
		$kabupatenArray = array("Bantul", "Gunungkidul", "Kulon Progo", "Sleman", "Yogyakarta");
		$usiaKlienArray = array("Dewasa", "Remaja16sd17", "Remaja12sd15", "AnakKecil");
		$jenisKasusArray = array("KTI", "KDP", "Perkosaan", "Pel-Seks", "KDK", "KTA", "Trafficking", "Lain");

		dd(KasusUtils::getCasesAndRelated()->get());

		dd(KasusUtils::getCases(2015, null, null, "Semua", "Semua")->get());
		
/*
		foreach ($kabupatenArray as $kabupaten)
		{
			foreach ($usiaKlienArray as $usiaKlien)
			{
				foreach ($jenisKasusArray as $jenisKasus)
				{
					$tableData[$kabupaten][$usiaKlien][$jenisKasus] = 
						KasusUtils::getCases(
							2015, null, $jenisKasus, $usiaKlien, $kabupaten)
						->count();
				}
			}
		}
		dd($tableData);
		return view('developer.testing-page')
			->with('tableData', $tableData);*/
	}

	function postTest(Request $request)
	{
		return $request;
	}

}
