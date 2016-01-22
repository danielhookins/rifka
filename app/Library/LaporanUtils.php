<?php namespace rifka\Library;

use rifka\Laporan;
use rifka\Library\InputUtils;
use rifka\Library\AlamatUtils;
use rifka\DWKabJenisUsia;
use Carbon\Carbon;
use rifka\Kasus;
use rifka\BentukKekerasan;
use DB;


/**
 *	A Library of Utilities for Report-Specific Tasks.
 */
class LaporanUtils
{

  // Get an Overview using selected statistics
  public static function getOverview()
  {
    // Prepare Variables
    $overview = array();
    $overview["thisYear"] = Carbon::today()->format('Y');
    $overview["thisMonth"] = Carbon::today()->format('m');
    $overview["month"] = DateUtils::getMonths();

    // Populate Array
    $overview["casesThisYear"] = LaporanUtils::
      getKasusTahun($overview["thisYear"]);
    $overview["casesLastYear"] = LaporanUtils::
      getKasusTahun($overview["thisYear"] - 1);
    $overview["casesThisMonth"] = LaporanUtils::
      getKasusBulan($overview["thisMonth"], $overview["thisYear"]);
    $overview["casesThisMonthLastYear"] = LaporanUtils::
      getKasusBulan($overview["thisMonth"], $overview["thisYear"] - 1);
    $overview["casesByMonth"] = LaporanUtils::
      getKasusBulanArray($overview["thisYear"]);
    $overview["clientsThisYear"] = count(LaporanUtils::
      getKlien($overview["thisYear"], "Semua"));
    $overview["clientsLastYear"] = count(LaporanUtils::
      getKlien(($overview["thisYear"] - 1), "Semua"));
    $overview["survivorJenisKasus"] = LaporanUtils::
      getCountByCaseType(LaporanUtils::getDistinctCaseTypes(), $overview["thisYear"]);

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


  public static function getCasesByCaseType($caseTypes, $year = null)
  {
    $cases = array();

    if(!is_array($caseTypes))
    {
        $caseTypeArray[] = $caseTypes;
    } else {
        $caseTypeArray = $caseTypes;
    }

    foreach($caseTypeArray as $type)
    {
      if(isset($year))
      {
        $cases[$type] = Kasus::
        where(DB::raw('YEAR(created_at)'), '=', $year)
        ->where('jenis_kasus', $type)->get();
      }
      else {
        $cases[$type] = Kasus::
        where('jenis_kasus', $type)->get();
      }
      
    }
    return array_filter($cases);
  }


  public static function getCountByCaseType($caseTypeArray, $year = null)
  {
    $cases = LaporanUtils::getCasesByCaseType($caseTypeArray, $year);

    foreach($caseTypeArray as $type)
    {
      $cases[$type] = $cases[$type]->count();
    }
    return array_filter($cases);
  }


  public static function getKabupatenCount($tahun) 
  {
    $kabupaten2 = AlamatUtils::getKabupaten();

    $data =  array();
    foreach ($kabupaten2 as $kabupaten) {
      $data[$kabupaten] = DWKabJenisUsia::where('tahun', $tahun)
        ->where('kabupaten', $kabupaten)
        ->count();
    }

    return $data;
  }

  public static function getKasusKabupaten($tahun)
  {
    $rows = DWKabJenisUsia::where('tahun', $tahun)
      ->get();

    $data = array();
    foreach ($rows as $row) {
      $data[] = array(
                    'Kasus ID' => $row->kasus_id,
                    'Nama Klien' => $row->nama_klien,
                    'Kabupaten' => $row->kabupaten,
                    'Jenis Kasus' => $row->jenis_kasus);
    }

    return $data;
  }


  public static function getKasusTahun($tahun, $actual = false)
  {
    $kasus = Kasus::where(DB::raw('YEAR(created_at)'), '=', $tahun);
    return ($actual) ? $kasus : $kasus->count();
  }


  public static function getKasusBulan($bulan, $tahun, $actual = false)
  {
    $kasus = Kasus::where(DB::raw('MONTH(created_at)'), '=', $bulan)
        ->where(DB::raw('YEAR(created_at)'), '=', $tahun);
    return ($actual) ? $kasus : $kasus->count();
  }


  public static function getKasusBulanArray($tahun)
  {
    $kasusBulan = array();
    for ($i = 1; $i < 13; $i++)
    {
      $kasusBulan[$i] = LaporanUtils::getKasusBulan($i, $tahun);
    }
    return $kasusBulan;
  }


  public static function getKlien($tahun, $jenisKlien)
  {
    $kasusTahun = LaporanUtils::getKasusTahun($tahun, true);
    $klienKasus = $kasusTahun->with('klienKasus')->get();
    
    // Get all clients of certain type.
    $klienCocok = array();
    foreach ($klienKasus as $kasus)
    {
        foreach ($kasus->klienKasus as $klien)
        {
            if ($jenisKlien == "Semua")
            {
              $klienCocok[] = $klien;
            }
            elseif ($klien["pivot"]["jenis_klien"] == $jenisKlien)
            {
              $klienCocok[] = $klien;
            }
        }
    }
    return $klienCocok;
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
    $anakKecil = array();       // Children (under 12)
    $remaja12sd15 = array();    // Teenagers (12-15)
    $remaja16sd17 = array();    // Teenagers (16-17)
    $dewasa = array();          // Adults (18+)

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

  public static function getBentukKekerasan($year)
  {
    // Define counters - set to 0
    $emosional  = 0;
    $fisik      = 0;
    $ekonomi    = 0;
    $seksual    = 0;
    $sosial     = 0;

    $kasus2 = Kasus::where(DB::raw('YEAR(created_at)'), '=', $year)->get();
    foreach ($kasus2 as $kasus) 
    {
        $bentuk = BentukKekerasan::where('kasus_id', $kasus->kasus_id)->first();
        
        $emosional = (isset($bentuk->emosional) && $bentuk->emosional != null) 
            ? $emosional + $bentuk->emosional : $emosional;
        $fisik = (isset($bentuk->fisik) && $bentuk->fisik != null) 
            ? $fisik + $bentuk->fisik : $fisik;
        $ekonomi = (isset($bentuk->ekonomi) && $bentuk->ekonomi != null) 
            ? $ekonomi + $bentuk->ekonomi : $ekonomi;
        $seksual = (isset($bentuk->seksual) && $bentuk->seksual != null) 
            ? $seksual + $bentuk->seksual : $seksual;
        $sosial = (isset($bentuk->sosial) && $bentuk->sosial != null) 
            ? $sosial + $bentuk->sosial : $sosial;

    }
    $results["emosional"] = $emosional;
    $results["fisik"] = $fisik;
    $results["ekonomi"] = $ekonomi;
    $results["seksual"] = $seksual;
    $results["sosial"] = $sosial;
    return $results;
  }

  public static function getAlamatKorban($year)
  {
    $rows = array();

    $klien2 = LaporanUtils::getKlien($year, 'Korban');
    foreach($klien2 as $klien) 
    {
        $dataKasus = array();
        
        $kasus2 = $klien->klienKasus;
        foreach($kasus2 as $kasus)
        {
            $alamat = $klien->alamatKlien->first();

            if(isset($alamat))
            {
                $dataKasus["kasus_id"] = $kasus->kasus_id;
                $dataKasus["jenis_kasus"] = $kasus->jenis_kasus;
                $dataKasus["kabupaten"] = $alamat->kabupaten;
                $dataKasus["kecamatan"] = $alamat->kecamatan;
                $dataKasus["alamat"] = $alamat->alamat;
                
                $rows[] = $dataKasus;
            }
        }
    }
    return $rows;
  }

  public static function fixIfEmpty($data) {
    if (empty($data)) {
      $data[] = ["Data" => "Belum ada data."];
    }
    return $data;
  }

}