<?php namespace rifka\Http\Controllers\Laporan;

use Illuminate\Http\Request;
use rifka\Http\Requests;
use rifka\Http\Controllers\LaporanController;
use rifka\Library\LaporanUtils;
use rifka\Library\InputUtils;
use rifka\Library\AlamatUtils;
use Carbon\Carbon;

// Reports for Cases by Regency (Kabupaten) of Victim
class KasusOlehKabupatenController extends LaporanController
{

  public function getLaporan()
  {
    return "kabupaten";
  }

  public function getTitle() 
  {
    return "Kasus oleh Kabupaten";
  }

  public function getControlFeatures()
  {
    $features["year"] = InputUtils::getUpdatedYear(\Input::get());
    $features["dropdown"] = $this->getDropDownArray();
    $features["kabupaten"] = InputUtils::getUpdatedSelect('kabupaten', \Input::get());
    return $features; 
  }

  private function getDropDownArray()
  {
    $dropdownArray = array();
    foreach (AlamatUtils::getKabupaten() as $kabupaten) {
      $dropdownArray[$kabupaten] = $kabupaten;
    }
    return $dropdownArray;
  }

  public function getDaftarData($year)
  {
    $kabupaten = "";
    
    if (\Input::get() == null) {
      $kabupaten = current($this->getDropDownArray());
    } else {
      $kabupaten = \Input::get('kabupaten');
    }

    return LaporanUtils::getKasusKabupaten($year, $kabupaten);
  }

  public function laporan()
  {
    $tahun = Carbon::today()->format('Y');
    $jenisKlien = "Korban";
    $jenisAlamat = "Domisili";

    $kabupaten = LaporanUtils::getKabupatenCount($tahun, $jenisKlien, $jenisAlamat);

    return view('laporan.index')
      ->with('laporan', 'kabupaten')
      ->with('year', $tahun)
      ->with('title', "Data Kabupaten")
      ->with('countArray', $kabupaten);
  }

  public function updateLaporan()
  {
    $year = InputUtils::getUpdatedYear(\Input::get());

    // TODO: Add functionality in view to change Client Type
    $jenisKlien = "Korban";

    // TODO: Add functionality in view to change Address Type
    $jenisAlamat = "Domisili";

    // Update array
    $kabupaten = LaporanUtils::getKabupatenCount($year, $jenisKlien, $jenisAlamat);

    return view('laporan.index')
      ->with('laporan', 'kabupaten')
      ->with('year', $year)
      ->with('title', "Data Kabupaten")
      ->with('countArray', $kabupaten);
  }

}
