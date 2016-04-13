<?php namespace rifka\Library;

use DB;
use rifka\DWKorbanKasus;
use rifka\DWPelakuKasus;
 
class ETLUtils {

  /*
  |--------------------------------------------------------------------------
  | ETL Utilities Library
  |--------------------------------------------------------------------------
  |
  | A Library of Utilities for ETL-Specific Tasks.
  |
  */

  /**
   * Initialize a data warehouse table 
   * based on given rows, model and attributes (row headers).
   *
   * @return void
   */
  public static function initTable($rows, $model, $attributes) {        
      
    $modelRef = 'rifka\\'.$model;

    foreach ($rows as $row) {
      $structure = array();
      try {
        foreach ($attributes as $attribute) {
          $structure[$attribute] = $row->$attribute;
        }
        // Create new table
        $newTable = $modelRef::create($structure); 
      } catch (Exception $e) {
        echo $e;
      }
    }
  }

  /**
   * Get all address details with corresponding client id.
   *
   * @return Array
   */
  public static function getAlamatKlien() {
    $rows = DB::table('alamat');
    
    $rows->join('alamat_klien', 'alamat.alamat_id', '=', 'alamat_klien.alamat_id')
          ->join('klien', 'alamat_klien.klien_id', '=', 'klien.klien_id');
    
    $rows->select(
      'klien.klien_id', 
      'alamat.alamat', 
      'alamat.kecamatan', 
      'alamat.kabupaten', 
      'alamat.provinsi');
    
    return $rows->get();
  }

  /**
   * Get basic client details.
   *
   * @return Array
   */
  public static function getKlien() {
    $rows = DB::table('klien');

    $rows->select(
      'klien.klien_id', 
      'klien.nama_klien', 
      'klien.email', 
      'klien.no_telp');
    
    return $rows->get();
  }

  /**
   * Get basic details about case-victims.
   *
   * @return Array
   */
  public static function getKorbanKasus() {
    $rows = DB::table('kasus');
    
    $rows->join('klien_kasus', function ($join) {
            $join->on('kasus.kasus_id', '=', 'klien_kasus.kasus_id')
                 ->where('klien_kasus.jenis_klien', '=', 'Korban');
            })
          ->join('klien', 'klien_kasus.klien_id', '=', 'klien.klien_id');
      
    $rows->select(
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
          'kasus.kabupaten', 
          DB::raw("YEAR(kasus.created_at) - YEAR(klien.tanggal_lahir) - (DATE_FORMAT(kasus.created_at, '%m%d') < DATE_FORMAT(klien.tanggal_lahir, '%m%d')) AS usia"));

    return $rows->get();
  }
	
	/**
   * Get basic details about case-perps.
   *
   * @return Array
   */
  public static function getPelakuKasus() {
    $rows = DB::table('kasus');
    
    $rows->join('klien_kasus', function ($join) {
            $join->on('kasus.kasus_id', '=', 'klien_kasus.kasus_id')
                 ->where('klien_kasus.jenis_klien', '=', 'Pelaku');
            })
          ->join('klien', 'klien_kasus.klien_id', '=', 'klien.klien_id');
      
    $rows->select(
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
          'kasus.kabupaten', 
          DB::raw("YEAR(kasus.created_at) - YEAR(klien.tanggal_lahir) - (DATE_FORMAT(kasus.created_at, '%m%d') < DATE_FORMAT(klien.tanggal_lahir, '%m%d')) AS usia"));

    return $rows->get();
  }

  /**
   * Get rows for an advanced search index.
   *
   * @return Array
   */
  public static function getIndexSearch() {
    $rows = DB::table('klien');

    $rows->join('klien_kasus', 'klien.klien_id', '=', 'klien_kasus.klien_id')
      ->join('kasus', 'klien_kasus.kasus_id', '=', 'kasus.kasus_id')
      ->join('alamat_klien', 'klien.klien_id', '=', 'alamat_klien.klien_id')
      ->join('alamat', 'alamat_klien.alamat_id', '=', 'alamat.alamat_id')
      ->join('arsip', 'kasus.kasus_id', '=', 'arsip.kasus_id');
      
    $rows->select(
      'klien.klien_id',
      'klien.nama_klien',
      'klien.kelamin',
      'klien.email',
      'klien.no_telp',
      'kasus.kasus_id',
      'kasus.jenis_kasus',
      DB::raw("YEAR(kasus.created_at) AS tahun"), 
      'alamat.alamat_id',
      'alamat.kabupaten',
      'alamat.kecamatan', 
      'alamat.alamat',
      'arsip.arsip_id',
      'arsip.no_reg',
      'arsip.media');

    return $rows->get();
  }

  public static function addVictim($klien_id, $kasus_id)
  {
    // TODO: refactor DRY
    // modify so Where clases can easily be added to 
    // getKorbanKasus()

    // Get Query
    $query = DB::table('kasus');

    $query
      ->join('klien_kasus', function ($join) {
            $join->on('kasus.kasus_id', '=', 'klien_kasus.kasus_id')
                 ->where('klien_kasus.jenis_klien', '=', 'Korban');
        })
      ->join('klien', 'klien_kasus.klien_id', '=', 'klien.klien_id');

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
          'kasus.kabupaten', 
          DB::raw("YEAR(kasus.created_at) - YEAR(klien.tanggal_lahir) - (DATE_FORMAT(kasus.created_at, '%m%d') < DATE_FORMAT(klien.tanggal_lahir, '%m%d')) AS usia"));

    $query->where('klien.klien_id', '=', $klien_id)
          ->where('kasus.kasus_id', '=', $kasus_id);

    // Use query results to add victim to DW
    $results = $query->get();
    $resultArray = (array) $results[0]; 

    return DWKorbanKasus::create($resultArray);
  }
	
	public static function addPerp($klien_id, $kasus_id)
  {
    // TODO: refactor DRY

    // Get Query
    $query = DB::table('kasus');

    $query
      ->join('klien_kasus', function ($join) {
            $join->on('kasus.kasus_id', '=', 'klien_kasus.kasus_id')
                 ->where('klien_kasus.jenis_klien', '=', 'Pelaku');
        })
      ->join('klien', 'klien_kasus.klien_id', '=', 'klien.klien_id');

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
          'kasus.kabupaten', 
          DB::raw("YEAR(kasus.created_at) - YEAR(klien.tanggal_lahir) - (DATE_FORMAT(kasus.created_at, '%m%d') < DATE_FORMAT(klien.tanggal_lahir, '%m%d')) AS usia"));

    $query->where('klien.klien_id', '=', $klien_id)
          ->where('kasus.kasus_id', '=', $kasus_id);

    // Use query results to add victim to DW
    $results = $query->get();
    $resultArray = (array) $results[0]; 

    return DWPelakuKasus::create($resultArray);
  }

  public static function setKabupatenKasusFromDW()
  {
    $query = DB::table('kasus')->get();
    
    foreach ($query as $kasus_row) {
      $dw_row = DB::table('dw_korban_kasus')
        ->where('kasus_id', $kasus_row->kasus_id)->first();
      
      if(
          ($dw_row != null)
          && ($kasus = \rifka\Kasus::find($kasus_row->kasus_id)) != null
      ) {
        
        if (($kasus->kabupaten == null) || ($kasus->kabupaten == "")) {
          $kasus->kabupaten = $dw_row->kabupaten;
          $kasus->save();
        }
      }
    }
 
    return "done";
  }

  public static function updateKasusKabupaten($kasus_id, $kabupaten)
  {
    try {
      $dw_table = DWKorbanKasus::where('kasus_id', $kasus_id)->first();
      $dw_table->kabupaten = $kabupaten;
      $dw_table->save();
    } catch (Exception $e) { return $e; }
  }

} 