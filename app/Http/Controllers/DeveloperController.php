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

		$klien_id = 1;

		// Get Query
    $query = DB::table('kasus');

    $query
      ->join('klien_kasus', function ($join) {
            $join->on('kasus.kasus_id', '=', 'klien_kasus.kasus_id')
                 ->where('klien_kasus.jenis_klien', '=', 'Korban');
        })
      ->join('klien', 'klien_kasus.klien_id', '=', 'klien.klien_id')
      ->leftJoin('alamat_klien', 'klien.klien_id', '=', 'alamat_klien.klien_id')
      ->leftJoin('alamat', 'alamat_klien.alamat_id', '=', 'alamat.alamat_id');

    $query
      ->select(
          'klien.klien_id',
          'klien.nama_klien',
          'klien.agama',
          'klien.pendidikan',
          'klien.pekerjaan',
          'klien.penghasilan',
          'klien.status_perkawinan',
          'klien.kondisi_klien',
          'klien_kasus.jenis_klien',
          'kasus.kasus_id',
          'kasus.jenis_kasus',
          'kasus.hubungan',
          'kasus.harapan_korban',
          DB::raw("YEAR(kasus.created_at) AS tahun"), 
          'alamat.kabupaten', 
          DB::raw("YEAR(kasus.created_at) - YEAR(klien.tanggal_lahir) - (DATE_FORMAT(kasus.created_at, '%m%d') < DATE_FORMAT(klien.tanggal_lahir, '%m%d')) AS usia"));

    // Use query results to add victim to DW
    $results = $query->get();
    dd($results);

    return 'test';
	
	}

	function postTest(Request $request)
	{
		return $request;
	}

}
