<?php namespace rifka\Http\Controllers;

use Illuminate\Http\Request;
use rifka\Http\Requests;
use rifka\Http\Controllers\Controller;
use rifka\Library\LaporanUtils;
use rifka\Library\InputUtils;
use Carbon\Carbon;

class LaporanController extends Controller
{
    
  public function __construct()
  {
    // Only allow authenticated users
    $this->middleware('auth');
    
    // Only allow active users
    $this->middleware('active');

    // Grant access to counsellors, managers and developers
    $this->middleware('userType:Konselor');
  }

  // Overview page
  public function index()
  {
    $overview = LaporanUtils::getOverview();

    return view('laporan.index')
        ->with('overview', $overview);
  }

  public function daftar()
  {
    $daftar["laporan"] = $this->getLaporan();
    $daftar["title"] = $this->getTitle();
    $daftar["control"] = $this->getControlFeatures();
    $daftar["data"] = $this->getDaftarData($daftar["control"]["year"]);
    $daftar["data"] = LaporanUtils::fixIfEmpty($daftar["data"]);

    return view('laporan.daftar-simple')->with('daftar', $daftar);
  }

  public function membuat()
  {
    $data = array();
    $data["thisYear"] = Carbon::today()->format('Y');

    return view('laporan.membuat')
      ->with('data', $data);
  }

  public function lihat()
  {
    dd(\Input::get());
    return view('laporan.lihat');
  }

}
