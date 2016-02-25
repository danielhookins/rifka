<?php namespace rifka\Http\Controllers\CaseDetail;

use Illuminate\Http\Request;
use rifka\Http\Requests;
use rifka\Http\Controllers\Controller;

class LitigasiController extends CaseDetailController {

  /*
  |--------------------------------------------------------------------------
  | Litigation (litigasi) Controller
  |--------------------------------------------------------------------------
  |
  | This controller handles functionality of litigasi resources.
  |
  */

  /**
   * Show the form for creating a new litigasi resource.
   *
   * @param Request $request
   * @param integer $kasus_id
   * @return Request
   */
  public function create(Request $request, $kasus_id)
  {
    $pageStatus = $_GET['jenis']."-baru";
    $request->session()->flash($pageStatus, True);
    return redirect()->route('kasus.show', [$kasus_id, '#litigasi']);
  }

}
