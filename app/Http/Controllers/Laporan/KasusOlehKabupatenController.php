<?php namespace rifka\Http\Controllers\Laporan;

use Illuminate\Http\Request;
use rifka\Http\Requests;
use rifka\Http\Controllers\LaporanController;
use rifka\Library\LaporanUtils;
use rifka\Library\InputUtils;
use Carbon\Carbon;

// Reports for Cases by Regency (Kabupaten) of Victim
// TODO: Access data from DataWarehouse table to improve accuracy of
//  historical data.  See issue#46
class KasusOlehKabupatenController extends LaporanController
{

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

  public function daftar()
  {
    $data = array();
    $data["laporan"] = "kabupaten";
    $data["title"] = "Kasus oleh Kabupaten";
    $data["year"] = Carbon::today()->format('Y');
    $data["headers"] = array('x', 'y', 'z');
    $data["rows"] = array(['x' => 'x data', 'y' => 'y data', 'z' => 'z data']);
    
    //$rows = LaporanUtils::getAlamatKorban($year);

    return view('laporan.daftar-simple')
      ->with('data', $data);
  }

  public function updateDaftar()
  {
    
    dd("Yeah");

    $year = InputUtils::getUpdatedYear(\Input::get());
    $rows = LaporanUtils::getAlamatKorban($year);

    $displayModel = array();
    $displayModel["year"] = $year;

    return view('laporan.index')
      ->with('list', "kabupaten")
      ->with('displayModel', $displayModel)
      ->with('rows', $rows);
  }

}
