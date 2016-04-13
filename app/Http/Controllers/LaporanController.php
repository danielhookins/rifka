<?php namespace rifka\Http\Controllers;

use Illuminate\Http\Request;
use rifka\Http\Requests;
use rifka\Http\Controllers\Controller;
use rifka\Library\LaporanUtils;
use rifka\Library\InputUtils;

class LaporanController extends Controller {

  /*
  |--------------------------------------------------------------------------
  | Laporan (Report) Controller
  |--------------------------------------------------------------------------
  |
  | This controller handles display of reports.
  |
  */

  /**
   * Display the view for generating a new report.
   *
   * @return Response
   */
  public function index()
  {
    return view('laporan.membuat');
  }

  /**
   * Display the generated report.
   *
   * @param Request $request
   * @return Response
   */
  public function lihat(Request $request)
  {
    $this->validate($request, ['tahun' => 'required|min:2000|max:3000|numeric']);

    // Set Variables
    $groupBy = \Input::get("group_by");
		$jenisKlien = \Input::get("jenis_klien");
    $data["tahun"] = \Input::get("tahun");
    $data["selected"] = LaporanUtils::getSelected(\Input::get());

    // Check category selected
    if ($data["selected"] == null) 
        return view('laporan.membuat');

    // Check & Set GroupBy type
    if(isset($groupBy) && $groupBy != "semua")
        $data["selected"][$groupBy] = "Kumpulan (".$groupBy.")";

    // Set Row Data
    $data["rows"] = LaporanUtils::getSelectedRows(
        $data["selected"], $data["tahun"], $groupBy, $jenisKlien);

    return view('laporan.lihat')
			->with('data', $data)
			->with('groupBy', $groupBy)
			->with('jenisKlien', $jenisKlien);
  }

  public function bentukKekerasanLaporan()
  {
    $year = (\Input::get('year') != null) 
      ? \Input::get('year') : \Carbon\Carbon::today()->format('Y');

    $data = LaporanUtils::getBentukKekerasanData($year);
    return view('laporan.bentukkekerasan')
      ->with('data', $data)
      ->with('year', $year);
  }

}
