<?php namespace rifka\Http\Controllers;

use rifka\Http\Requests;
use rifka\Http\Controllers\Controller;
use Illuminate\Http\Request;
use rifka\Library\ETLUtils;
use rifka\DWKorbanKasus;
use rifka\KlienKasus;
use DB;

class DeveloperController extends Controller {

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

		// Grant access to only developers
		$this->middleware('userType:Developer');
	}

	//
	function index() 
	{
		return view('developer.index');
	}

	function test() 
	{

		$data["jenis_klien"] = "Pelaku";
		$data["kasus_id"] = "2";
		$data["klien_id"] = "1";
		

		// Update Klien Kasus
		$klienKasus = KlienKasus::where('klien_id', '=', $data["klien_id"])
			->where('kasus_id', '=', $data["kasus_id"])
    	->update(['jenis_klien' => $data["jenis_klien"]]);
		
    // Update Data Warehouse
		$dwCheck = DB::table('dw_korban_kasus')
											->where('kasus_id', '=', $data["kasus_id"])
        							->where('klien_id', '=', $data["klien_id"])
        							->count();

		// Add new victim to DW Korban Kasus
		if(($dwCheck === 0) && ($data["jenis_klien"] == "Korban")) {
			ETLUtils::addVictim($data["klien_id"]);
		}

		// Remove client from DW Korban Kasus
		if(($dwCheck !== 0) && ($data["jenis_klien"] == "Pelaku")) {
			$deletedRows = DWKorbanKasus::where('kasus_id', '=', $data["kasus_id"])
								->where('klien_id', '=', $data["klien_id"])
								->delete();
		}

		return "test";
	
	}

	function postTest(Request $request)
	{
		return $request;
	}

}
