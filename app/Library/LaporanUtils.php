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

  /**
   * Get the number of cases in each kabupaten
   * @param int $year
   * @param string $clientType {"Korban", "Pelaku"}
   * @param string $addressType {"KTP", "Domisili", "Semua"}
   */
  public static function getKabupaten($year, $clientType, $addressType)
  {
    // Get cases for the year
    $kasus = Kasus::where(DB::raw('YEAR(created_at)'), '=', $year);

    // Get clients for the year
    // clients must match $clientType
    $test = $kasus->with('klienKasus')->get();
    $korbanYear = array();
    foreach ($test as $case)
    {
        foreach ($case->klienKasus as $klien)
        {
            if ($klien["pivot"]["jenis_klien"] == $clientType)
            {
                array_push($korbanYear, $klien);
            }
        }
    }

    // Get kabupaten for the year
    // Kabupaten must match $addressType        
    $kabupatenKorbanYear = array();
    foreach ($korbanYear as $korban)
    {
        foreach ($korban->alamatKlien as $alamat)
        {
            $jenisAlamat = $alamat["pivot"]["jenis"];
            
            // Check address type matches
            $continue = false;
            if ($addressType =- "Semua")
            {
              $continue = true;
            }
            elseif($addressType == "Domisili")
            {
                if($jenisAlamat == "Domisili"
                    || $jenisAlamat == "KTPDomisili"
                    || $jenisAlamat == null)
                {
                    $continue = true;
                } else {
                    $continue = false;
                }
            }
            else if($addressType == "KTP")
            {
                if($jenisAlamat == "KTP"
                    || $jenisAlamat == "KTP&Domisili"
                    || $jenisAlamat == null)
                {
                    $continue = true;
                } else {
                    $continue = false;
                }
            }
            if($continue)
            {
               if (isset($kabupatenKorbanYear[$alamat->kabupaten]))
                {
                    $kabupatenKorbanYear[$alamat->kabupaten]++;
                }
                else
                {
                    $kabupatenKorbanYear[$alamat->kabupaten] = 1;
                } 
            }

        }
    }

    return $kabupatenKorbanYear;
  }

}