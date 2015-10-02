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
	
  public static function getDistinctCaseTypes($year = null)
  {
    $caseTypes = array();

    if ($year != null)
    {
      $query = Kasus::
            where(DB::raw('YEAR(created_at)'), '=', $year)
            ->select('jenis_kasus')->distinct();
      
    } else {
      $query = Kasus::
            select('jenis_kasus')->distinct();
    }

    foreach($query->get()->toArray() as $record)
    {
        array_push($caseTypes, $record["jenis_kasus"]);
    }

    return $caseTypes;
    
  }

  public static function getCountByCaseType($caseTypeArray, $year = null)
  {
    $typeCount = array();

    foreach($caseTypeArray as $type)
    {
      if(isset($year))
      {
        $typeCount[$type] = Kasus::
        where(DB::raw('YEAR(created_at)'), '=', $year)
        ->where('jenis_kasus', $type)
        ->count();
      }
      else {
        $typeCount[$type] = Kasus::
        where('jenis_kasus', $type)
        ->count();
      }
      
    }

    return array_filter($typeCount);

  }

}