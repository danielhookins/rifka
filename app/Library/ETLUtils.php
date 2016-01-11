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

      // Echo message for user
      echo '<strong>Written record:</strong>';
      echo '<br />';
      echo 'kasus_id: '.$case->kasus_id;
      echo '<br />';
      echo 'klien_id: '.$case->klien_id;
      echo '<br />';
      echo 'kabupaten:  '.$case->kabupaten;
      echo '<br />';
      echo 'jenis_kasus:  '.$case->jenis_kasus;
      echo '<br />';
      echo 'usia: '.$case->usia;
      echo '<br />';
      echo 'tahun:  '.$case->tahun;
      echo '<br />';
      echo '<br />';
      } catch (Exception $e) {
        echo $e;
      }
    }
  }

  public static function getKabJenisUsia() 
  {
  	// Define cases variable
    $cases = DB::table('kasus');

    // Join the client table using the pivot table
    $cases->join('klien_kasus', 'kasus.kasus_id', '=', 'klien_kasus.kasus_id');
    $cases->join('klien', 'klien_kasus.klien_id', '=', 'klien.klien_id');

  	// Join the address table using the pivot table
    $cases->join('alamat_klien', 'klien.klien_id', '=', 'alamat_klien.klien_id');
    $cases->join('alamat', 'alamat_klien.alamat_id', '=', 'alamat.alamat_id');

  	// Select Statement
  	$cases
  		->select(
  				'klien.klien_id', 
  				'kasus.kasus_id', 
  				'kasus.jenis_kasus',
  				DB::raw("YEAR(kasus.created_at) AS tahun"), 
  				'alamat.kabupaten', 
  				DB::raw("YEAR(kasus.created_at) - YEAR(klien.tanggal_lahir) - (DATE_FORMAT(kasus.created_at, '%m%d') < DATE_FORMAT(klien.tanggal_lahir, '%m%d')) AS usia"));

		return $cases;
  }

} 