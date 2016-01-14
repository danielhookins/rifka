<?php namespace rifka\Http\Controllers\Laporan;

use Illuminate\Http\Request;
use rifka\Http\Requests;
use rifka\Http\Controllers\Controller;
use rifka\Library\LaporanUtils;
use rifka\Library\InputUtils;
use Carbon\Carbon;

// Reports for Cases by Case type
class KasusOlehJenisController extends Controller
{

  public function laporan()
  {
    $year = Carbon::today()->format('Y');
    
    $countArray = LaporanUtils::getCountByCaseType(
        LaporanUtils::getDistinctCaseTypes(), $year);

    return view('laporan.index')
        ->with('laporan', "jenis-kasus")
        ->with('year', $year)
        ->with('countArray', $countArray)
        ->with('title', "Jenis Kasus untuk " . $year);
  }
  
  public function updateLaporan()
  {
    $year = InputUtils::getUpdatedYear(\Input::get());

    $countArray = LaporanUtils::getCountByCaseType(
        LaporanUtils::getDistinctCaseTypes(), $year);

    return view('laporan.index')
        ->with('laporan', "jenis-kasus")
        ->with('year', $year)
        ->with('countArray', $countArray)
        ->with('title', "Jenis Kasus untuk " . $year);
  }


  public function daftar()
  {
    $year = Carbon::today()->format('Y');
    $caseType = "KTI";
    $availableTypes = LaporanUtils::getDistinctCaseTypes($year);

    $displayModel = array();
    $displayModel["year"] = $year;
    $displayModel["caseType"] = $caseType;
    $displayModel["availableTypes"] 
        = InputUtils::toSelectArray($availableTypes);
    
    $cases = LaporanUtils::getCasesByCaseType($caseType, $year);

    return view('laporan.index')
        ->with('list', "jenis-kasus")
        ->with('displayModel', $displayModel)
        ->with('cases', $cases)
        ->with('title', "Jenis Kasus untuk " . $year);
  }
  
  public function updateDaftar()
  {
    $year = InputUtils::getUpdatedYear(\Input::get());
    $caseType = \Input::get("caseType");
    $availableTypes = LaporanUtils::getDistinctCaseTypes($year);

    $displayModel = array();
    $displayModel["year"] = $year;
    $displayModel["caseType"] = $caseType;
    $displayModel["availableTypes"] 
      = InputUtils::toSelectArray($availableTypes);

    if($caseType == ""){$caseType = null;}        
    $cases = LaporanUtils::getCasesByCaseType($caseType, $year);

    return view('laporan.index')
      ->with('list', "jenis-kasus")
      ->with('displayModel', $displayModel)
      ->with('cases', $cases)
      ->with('title', "Jenis Kasus untuk " . $year);
  }

}
