<?php 
namespace rifka\Library;

use rifka\Library\LaporanUtils;
use rifka\Library\ExcelUtils;
 
/**
 *	A Library of exportable reports.
 */
class LaporanExport
{
	
	/**
	 * Export a "Kasus Oleh Usia" report.
	 *
	 * @param $years - The array of years to include
	 */
	public static function kasusOlehUsia($years)
  {
  	$title = "Kasus oleh Usia";
  	$ages = array("anakKecil", "remaja12sd15", "remaja16sd17", "dewasa");
    $headers =array("Tahun", "Jenis Kasus", "Usia", "Jumlah Kasus");

  	$dataBuilder = array();
  	$casesByYearAndType = array();
  	$complete = array();

  	foreach($years as $year) {
  		$types = LaporanUtils::getDistinctCaseTypes($year);
  		
  		foreach ($types as $type) {
  			$casesByYearAndType[$type] = LaporanUtils::getCaseClientsByAge($year, $type);
  		}
  	
  		foreach($casesByYearAndType as $type => $caseBreakdownByAge) {
  			foreach($caseBreakdownByAge as $age => $cases) {
  				$dataBuilder[] = $year;
  				$dataBuilder[] = $type;
  				$dataBuilder[] = $age;
  				$dataBuilder[] = count($cases);
  				array_push($complete, $dataBuilder);
  				unset($dataBuilder);
  			}
  		}

  	}
  	return ExcelUtils::exportRowsData($title, $headers, $complete);
  }

  public static function kasusOlehJenis($years) 
  {
    $title = "Kasus oleh Usia";
    $headers =array("Tahun", "Jenis Kasus", "Jumlah Kasus");

    $dataBuilder = array();
    $casesByYearAndType = array();
    $complete = array();

    foreach($years as $year) {
      $types = LaporanUtils::getDistinctCaseTypes($year);
      
      foreach ($types as $type) {
        $cases = LaporanUtils::getCasesByCaseType($type, $year);
        
        $dataBuilder[] = $year;
        $dataBuilder[] = $type;
        $dataBuilder[] = count($cases[$type]);
        array_push($complete, $dataBuilder);
        unset($dataBuilder);
      }
    }
    return ExcelUtils::exportRowsData($title, $headers, $complete);
  }

}