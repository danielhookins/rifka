<?php namespace rifka\Http\Controllers\Laporan;

use Illuminate\Http\Request;
use rifka\Http\Requests;
use rifka\Http\Controllers\Controller;
//use rifka\Library\LaporanUtils;
use rifka\Library\InputUtils;
use Carbon\Carbon;
use DB;
use rifka\Kasus;

// Reports for Cases for Year
class KasusPerTahunController extends Controller
{

  public function daftar()
  {
    $year = Carbon::today()->format('Y');
    $casesYear = Kasus::
      where(DB::raw('YEAR(created_at)'), '=', $year);
    $casesTypeDistinct = Kasus::
      where(DB::raw('YEAR(created_at)'), '=', $year)
      ->select('jenis_kasus')->distinct();

    $jenisKasus = array();
    foreach($casesTypeDistinct->get()->toArray() as $type)
    {
      array_push($jenisKasus, $type["jenis_kasus"]);
    }

    return view('laporan.index')
      ->with('list', "kasus-tahun")
      ->with('year', $year)
      ->with('cases', $casesYear->get());
  }

  public function updateDaftar()
  {
    $year = InputUtils::getUpdatedYear(\Input::get());

    $casesYear = Kasus::
      where(DB::raw('YEAR(created_at)'), '=', $year);
    $casesTypeDistinct = Kasus::
      where(DB::raw('YEAR(created_at)'), '=', $year)
      ->select('jenis_kasus')->distinct();

    $jenisKasus = array();
    foreach($casesTypeDistinct->get()->toArray() as $type)
    {
      array_push($jenisKasus, $type["jenis_kasus"]);
    }

    return view('laporan.index')
      ->with('list', "kasus-tahun")
      ->with('year', $year)
      ->with('cases', $casesYear->get());
  }

}
