<?php 
namespace rifka\Library;

use rifka\Laporan;
use rifka\Library\InputUtils;
use Carbon\Carbon;
use rifka\Kasus;
use DB;

 
/**
 *	A Library of Utilities for Report-Specific Tasks.
 */
class LaporanUtils
{
	
	public static function getKasusOlehUmur() 
	{
		
 		return;
		
	}

	public static function getKasusOlehJenis($year = null)
	{
		$countArray = array();
		
		if(isset($year))
		{
			$KTI = Kasus::where('jenis_kasus', 'KTI')
            ->where(DB::raw('YEAR(created_at)'), '=', $year)
            ->count();
	    $KDP = Kasus::where('jenis_kasus', 'KDP')
            ->where(DB::raw('YEAR(created_at)'), '=', $year)
            ->count();
    	$Perkosaan = Kasus::where('jenis_kasus', 'Perkosaan')
            ->where(DB::raw('YEAR(created_at)'), '=', $year)
            ->count();
    	$PelSeks = Kasus::where('jenis_kasus', 'Pel-Seks')
            ->where(DB::raw('YEAR(created_at)'), '=', $year)
            ->count();
    	$KDK = Kasus::where('jenis_kasus', 'KTI')
            ->where(DB::raw('YEAR(created_at)'), '=', $year)
            ->count();
      $Lain = Kasus::where('jenis_kasus', 'Lain')
            ->where(DB::raw('YEAR(created_at)'), '=', $year)
            ->count();

      $countArray = array();
      $countArray["KTI"] = $KTI;
      $countArray["KDP"] = $KDP;
      $countArray["Perkosaan"] = $Perkosaan;
      $countArray["Pel-Seks"] = $PelSeks;
      $countArray["KDK"] = $KDK;
      $countArray["Lain"] = $Lain;
		}

    return $countArray;
	}

}