<?php namespace rifka\Http\Controllers\Laporan;

use Illuminate\Http\Request;
use rifka\Http\Requests;
use rifka\Http\Controllers\Controller;
use rifka\Library\LaporanUtils;
use rifka\Library\InputUtils;
use Carbon\Carbon;
use rifka\Library\DateUtils;

// Reports for Cases by Month
class KasusPerBulanController extends Controller
{

  public function laporan()
  {
    $tahun = Carbon::today()->format('Y');
    $months = DateUtils::getMonths();
    $kasusBulan = LaporanUtils::getKasusBulanArray($tahun);

    return view('laporan.index')
      ->with('laporan', 'kasus-per-bulan')
      ->with('year', $tahun)
      ->with('month', $months)
      ->with('countArray', $kasusBulan);
  }

  public function updateLaporan()
  {
    $year = InputUtils::getUpdatedYear(\Input::get());
    $months = DateUtils::getMonths();
    $kasusBulan = LaporanUtils::getKasusBulanArray($year);

    return view('laporan.index')
      ->with('laporan', 'kasus-per-bulan')
      ->with('year', $year)
      ->with('month', $months)
      ->with('countArray', $kasusBulan);
  }

}