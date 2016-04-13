<?php namespace rifka\Library;

use DB;
use rifka\Library\InputUtils;
use rifka\DWKorbanKasus;
use rifka\DWPelakuKasus;

/**
 *	A Library of Utilities for Report-Specific Tasks.
 */
class LaporanUtils {

  public static function getSelected($input)
  {
    return InputUtils::cleanInput($input, array("_method","_token", "tahun", "group_by", "jenis_klien"));
  }

  public static function getSelectedRows($selected, $tahun, $group_by, $jenis_klien)
  {
    // Where
    if($jenis_klien == "Pelaku") {
			$rows = DWPelakuKasus::where("tahun", $tahun);
		} else {
			$rows = DWKorbanKasus::where("tahun", $tahun);
		}
    
    // Select
    $select = array_keys($selected);
    if($group_by != "semua") {
      if (in_array($group_by, $select)) unset($select[$group_by]);
      $custom = DB::raw("COUNT(".$group_by.") AS jumlah");
      array_push($select, $custom);
    }
    $rows->select($select);

    // Group By
    if($group_by != "semua") {
      $group = array();
      $group[] = $group_by;
      foreach($selected as $key => $value) {
        if (!in_array($key, $group)) $group[] = $key;
      }
      $rows->groupBy($group);
    } else {
      $rows->groupBy("kasus_id");
    }

    return $rows->get();
  }

  public static function getBentukKekerasanData($year)
  {
    $jenisKasusList = array(
      'KTI','KDP','Perkosaan','Pel-Seks','KDK','Trafficking','Lain'
    );
    $bentukKekerasanList = array(
      'Emosional','Fisik','Ekonomi','Seksual','Sosial'
    );

    // Populate Data
    foreach ($jenisKasusList as $jenisKasus) {
      foreach ($bentukKekerasanList as $bentukKekerasan) {
        $data[$jenisKasus][$bentukKekerasan] = 
          \rifka\Kasus::where('jenis_kasus', $jenisKasus)
            ->where(DB::raw("YEAR(kasus.created_at)"), $year)
            ->Join('bentuk_kekerasan', 'kasus.kasus_id', '=', 'bentuk_kekerasan.kasus_id')
            ->where('bentuk_kekerasan.'.$bentukKekerasan, '>', 0)
            ->count();
      }
    }
      
    return $data;
  }

}