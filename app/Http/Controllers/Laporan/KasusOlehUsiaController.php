<?php namespace rifka\Http\Controllers\Laporan;

use Illuminate\Http\Request;
use rifka\Http\Requests;
use rifka\Http\Controllers\Controller;
use rifka\Library\LaporanUtils;
use rifka\Library\InputUtils;
use Carbon\Carbon;

// Reports for Cases by Age of Victim (at time of case)
class KasusOlehUsiaController extends Controller
{

  public function laporan()
  {
    $year = Carbon::today()->format('Y');
    $usia = LaporanUtils::getCaseClientsByAge($year);

    $typeCases = array();
    foreach(LaporanUtils::getDistinctCaseTypes($year) as $type)
    {
      $typeCases[$type] = LaporanUtils::getCaseClientsByAge($year, $type);
    }

    return view('laporan.index')
      ->with('laporan', 'usia')
      ->with('year', $year)
      ->with('usia', $usia)
      ->with('typeCases', $typeCases);
  }

  public function updateLaporan()
  {
    $year = InputUtils::getUpdatedYear(\Input::get());
    $usia = LaporanUtils::getCaseClientsByAge($year);

    $typeCases = array();
    foreach(LaporanUtils::getDistinctCaseTypes($year) as $type)
    {
      $typeCases[$type] = LaporanUtils::getCaseClientsByAge($year, $type);
    }

    return view('laporan.index')
      ->with('laporan', 'usia')
      ->with('year', $year)
      ->with('usia', $usia)
      ->with('typeCases', $typeCases);
  }

  public function daftar()
  {
    // Set variable defaults
    $year = Carbon::today()->format('Y');
    $age = "dewasa";
    $caseType = "all";

    $displayModel = array();
    $displayModel["year"] = $year;
    $displayModel["age"] = $age;

    // Retrieve clients
    $clients = LaporanUtils::getCaseClientsByAge($year, $caseType);

    return view('laporan.index')
      ->with('list', "usia")
      ->with('displayModel', $displayModel)
      ->with('klien2', $clients[$age]);
  }

  public function updateDaftar() {
    $input = \Input::get();
    $year = InputUtils::getUpdatedYear(\Input::get());
    $age = $input["age"];
    $caseType = "all";
    
    $displayModel = array();
    $displayModel["year"] = $year;
    $displayModel["age"] = $age;

    // Retrieve clients
    $clients = LaporanUtils::getCaseClientsByAge($year, $caseType);

    return view('laporan.index')
      ->with('list', "usia")
      ->with('displayModel', $displayModel)
      ->with('klien2', $clients[$age]);
  }

}
