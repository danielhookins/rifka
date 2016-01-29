<?php namespace rifka\Library;

use DB;
use rifka\DWKorbanKasus;
 
/**
 *  A Library of Utilities for ETL-Specific Tasks.
 */
class ETLUtils
{

  public static function initTable($rows, $model, $attributes) {        
      
    $modelRef = 'rifka\\'.$model;

    foreach ($rows as $row) {
      $structure = array();
      try {
        foreach ($attributes as $attribute) {
          $structure[$attribute] = $row->$attribute;
        }
        // Create new Index Record
        $indexRecord = $modelRef::create($structure); 
      } catch (Exception $e) {
        echo $e;
      }
    }
  }

  public static function updateRow($model, $data)
  {
    $modelRef = 'rifka\\'.$model;

  }

  public static function getAlamatKlien()
  {
    $rows = DB::table('alamat');

    $rows->join('alamat_klien', 'alamat.alamat_id', '=', 'alamat_klien.alamat_id')
          ->join('klien', 'alamat_klien.klien_id', '=', 'klien.klien_id');

    $rows->select('klien.klien_id', 'alamat.alamat', 'alamat.kecamatan', 'alamat.kabupaten', 'alamat.provinsi');

    return $rows->get();
  }

  public static function getKlien()
  {
    $rows = DB::table('klien');
    $rows->select('klien.klien_id', 'klien.nama_klien', 'klien.email', 'klien.no_telp');
    return $rows->get();
  }

  public static function getKorbanKasus() 
  {
    // Define cases variable
    $rows = DB::table('kasus');

    $rows
      ->join('klien_kasus', function ($join) {
            $join->on('kasus.kasus_id', '=', 'klien_kasus.kasus_id')
                 ->where('klien_kasus.jenis_klien', '=', 'Korban');
        })
      ->join('klien', 'klien_kasus.klien_id', '=', 'klien.klien_id')
      ->join('alamat_klien', 'klien.klien_id', '=', 'alamat_klien.klien_id')
      ->join('alamat', 'alamat_klien.alamat_id', '=', 'alamat.alamat_id');
      
    $rows
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

    return $rows->get();
  }

  public static function getIndexSearch() 
  {
    // Define cases variable
    $rows = DB::table('klien');

    $rows
      ->join('klien_kasus', 'klien.klien_id', '=', 'klien_kasus.klien_id')
      ->join('kasus', 'klien_kasus.kasus_id', '=', 'kasus.kasus_id')
      ->join('alamat_klien', 'klien.klien_id', '=', 'alamat_klien.klien_id')
      ->join('alamat', 'alamat_klien.alamat_id', '=', 'alamat.alamat_id')
      ->join('arsip', 'kasus.kasus_id', '=', 'arsip.kasus_id');
      
    $rows
      ->select(
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

  public static function addVictim($klien_id)
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
      ->join('klien', 'klien_kasus.klien_id', '=', 'klien.klien_id')
      ->join('alamat_klien', 'klien.klien_id', '=', 'alamat_klien.klien_id')
      ->join('alamat', 'alamat_klien.alamat_id', '=', 'alamat.alamat_id');
      
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

    $query->where('klien.klien_id', '=', $klien_id);

    // Use query results to add victim to DW
    $results = $query->get();
    $resultArray = (array) $results[0]; 
    return DWKorbanKasus::create($resultArray);

  }

} 