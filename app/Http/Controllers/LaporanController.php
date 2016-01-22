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
    if (\Input::get() != null)
    {
      $daftar["year"] = InputUtils::getUpdatedYear(\Input::get());
    } else {
      $daftar["year"] =  Carbon::today()->format('Y');
    }
    
    $daftar["laporan"] = $this->getLaporan();
    $daftar["title"] = $this->getTitle();
    
    $daftar["data"] = $this->getDaftarData($daftar["year"]);
    $daftar["data"] = LaporanUtils::fixIfEmpty($daftar["data"]);

    return view('laporan.daftar-simple')->with('daftar', $daftar);
  }

}
