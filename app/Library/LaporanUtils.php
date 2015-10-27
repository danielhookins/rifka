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
	
  public static function getOverview()
  {
    // Prepare Data for Overview
    $overview = array();
    $year = Carbon::today()->format('Y');
    $month = Carbon::today()->format('m');
    $months = DateUtils::getMonths();

    // Case Data
    // Cases this year
    $casesThisYear = Kasus::where(DB::raw('YEAR(created_at)'), '=', $year)->count();
    // Cases last year
    $casesLastYear = Kasus::where(DB::raw('YEAR(created_at)'), '=', ($year - 1))->count();
    // Cases this month
    $casesThisMonth = Kasus::where(DB::raw('MONTH(created_at)'), '=', $month)
    ->where(DB::raw('YEAR(created_at)'), '=', $year)
    ->count();
    // Cases this month last year
    $casesThisMonthLastYear = Kasus::where(DB::raw('MONTH(created_at)'), '=', $month)
    ->where(DB::raw('YEAR(created_at)'), '=', ($year - 1))
    ->count();
    // Data for cases by month graph
    $casesByMonth = LaporanUtils::getKasusBulanArray($year);

    // Client Data
    // Clients this year
    $clientsThisYear = count(LaporanUtils::getKlien($year, "Semua"));
    // Clients last year
    $clientsLastYear = count(LaporanUtils::getKlien(($year - 1), "Semua"));
    // Survivors by case type
    $survivorJenisKasus = LaporanUtils::getCountByCaseType(
        LaporanUtils::getDistinctCaseTypes(), $year);

    $overview["thisYear"] = $year;
    $overview["thisMonth"] = $month;
    $overview["casesThisYear"] = $casesThisYear;
    $overview["casesLastYear"] = $casesLastYear;
    $overview["casesThisMonth"] = $casesThisMonth;
    $overview["casesThisMonthLastYear"] = $casesThisMonthLastYear;
    $overview["clientsThisYear"] = $clientsThisYear;
    $overview["clientsLastYear"] = $clientsLastYear;
    $overview["survivorJenisKasus"] = $survivorJenisKasus;
    $overview["casesByMonth"] = $casesByMonth;
    $overview["month"] = $months;

    return $overview;
  }

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

  public static function getKasusTahun($tahun)
  {
    return Kasus::where(DB::raw('YEAR(created_at)'), '=', $tahun);
  }

  public static function getKasusBulanTahun($bulan, $tahun)
  {
    return Kasus::where(DB::raw('MONTH(created_at)'), '=', $bulan)
        ->where(DB::raw('YEAR(created_at)'), '=', $tahun);
  }

  public static function getKasusBulanArray($tahun)
  {
    $kasusBulan = array();

    for ($i = 1; $i < 13; $i++)
    {
      $kasusBulan[$i] = LaporanUtils::getKasusBulanTahun($i, $tahun)->count();
    }
    return $kasusBulan;
  }

  public static function getKlien($tahun, $jenisKlien = "Semua")
  {

    $kasusTahun = LaporanUtils::getKasusTahun($tahun);
    $klienKasus = $kasusTahun->with('klienKasus')->get();
    
    // Get all clients of certain type.
    $klienCocok = array();
    foreach ($klienKasus as $kasus)
    {
        foreach ($kasus->klienKasus as $klien)
        {
            if ($jenisKlien = "Semua")
            {
              array_push($klienCocok, $klien);
            }
            elseif ($klien["pivot"]["jenis_klien"] == $clientType)
            {
              array_push($klienCocok, $klien);
            }
        }
    }
    return $klienCocok;
  }

  public static function getUpdatedYear($input)
  {
    $year = $input['year'];
        
    if(isset($input['change']))
    {
        if($input['change'] == "prev")
        {
            $year = $year - 1;
        }
        elseif($input['change'] == "next")
        {
            $year = $year + 1;
        }
    }
    return $year;
  }

  public static function getCaseClientsByAge($year, $caseType="all")
  {
    // Define the search query for specific results
    $kasusQuery = Kasus::where(DB::raw('YEAR(created_at)'), '=', $year);

    if($caseType != "all")
    {
      $kasusQuery = $kasusQuery->where("jenis_kasus", $caseType);
    }
  
    $kasusQuery = $kasusQuery->get();

    // Define array variables
    $anakKecil = array();  // Children (under 12)
    $remaja12sd15 = array(); // Teenagers (12-15)
    $remaja16sd17 = array(); // Teenagers (16-17)
    $dewasa = array();  // Adults (18+)

    // Iterate through cases that match query
    foreach($kasusQuery as $kasus)
    {
        $data = array();
        
        // Only work with cases that have a created_at date
        $data["tgl_buka"] = $kasus->created_at;
        if(isset($data["tgl_buka"]) && $data["tgl_buka"] != null) {
            $data["tgl_buka"] = $kasus->created_at;
            
            // retrieve the victims
            $korbankasus = array();
            foreach($kasus->klienKasus()->get() as $klien)
            {
                if($klien["pivot"]["jenis_klien"] == "Korban")
                {
                    array_push($korbankasus, $klien);
                }
            }
            $data["korban"] = $korbankasus;

            // Iterate through victims and categorise them
            //  base on age groups
            foreach($data["korban"] as $korban)
            {
                if(isset($korban->tanggal_lahir) 
                    && $korban->tanggal_lahir != null)
                {
                    if($tgl_lahir = Carbon::createFromFormat('Y-m-d', $korban->tanggal_lahir))
                    {
                        // Add those under 12 to anak kecil array
                        if($tgl_lahir->diff($data["tgl_buka"])->y < 12) 
                        {
                            array_push($anakKecil, $korban);
                        }
                        // Add those under 16 to remaja 12-15 array
                        elseif ($tgl_lahir->diff($data["tgl_buka"])->y < 16)
                        {
                            array_push($remaja12sd15, $korban);
                        }
                        // Add those under 18 to remaja 16-17 array
                        elseif ($tgl_lahir->diff($data["tgl_buka"])->y < 18)
                        {
                            array_push($remaja16sd17, $korban);
                        }
                        // Victim is Adult
                        else {
                            array_push($dewasa, $korban);
                        }
                    }
                }
            }
        }
    }
    
    $usia = array();
    $usia["anakKecil"] = $anakKecil;
    $usia["remaja12sd15"] = $remaja12sd15;
    $usia["remaja16sd17"] = $remaja16sd17;
    $usia["dewasa"] = $dewasa;

    return $usia;
  }

}