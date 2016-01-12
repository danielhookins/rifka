<?php namespace rifka\Library;

use DB;
use rifka\DWKabJenisUsia;
 
/**
 *  A Library of Utilities for ETL-Specific Tasks.
 */
class ETLUtils
{

  public static function initKabJenisUsia()
  {
    // TODO: break down requests to each year -- as the server cannot process all in under 30seconds
    $cases = ETLUtils::getKabJenisUsia()->get();

    foreach ($cases as $case) {

      try {
        // Create new DW Record
      $dwKabJenisUsia = DWKabJenisUsia::create([
          'kasus_id'  => $case->kasus_id,
          'klien_id'  => $case->klien_id,
          'kabupaten' => $case->kabupaten,
          'jenis_kasus' => $case->jenis_kasus,
          'usia'  => $case->usia,
          'tahun' => $case->tahun,
        ]);
        
      } catch (Exception $e) {
        echo $e;
      }
    }
  }

  public static function getKabJenisUsia() 
  {
    // Define cases variable
    $cases = DB::table('kasus');

    // Select Statement
    $cases
      ->join('klien_kasus', function ($join) {
            $join->on('kasus.kasus_id', '=', 'klien_kasus.kasus_id')
                 ->where('klien_kasus.jenis_klien', '=', 'Korban');
        })
      ->join('klien', 'klien_kasus.klien_id', '=', 'klien.klien_id')
      ->join('alamat_klien', 'klien.klien_id', '=', 'alamat_klien.klien_id')
      ->join('alamat', 'alamat_klien.alamat_id', '=', 'alamat.alamat_id');
      
    $cases
      ->select(
          'klien.klien_id',
          'klien_kasus.jenis_klien',
          'kasus.kasus_id',
          'kasus.jenis_kasus',
          DB::raw("YEAR(kasus.created_at) AS tahun"), 
          'alamat.kabupaten', 
          DB::raw("YEAR(kasus.created_at) - YEAR(klien.tanggal_lahir) - (DATE_FORMAT(kasus.created_at, '%m%d') < DATE_FORMAT(klien.tanggal_lahir, '%m%d')) AS usia"));

    return $cases;
  }

} 