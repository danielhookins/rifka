<?php namespace rifka\Http\Controllers\CaseDetail;

use Illuminate\Http\Request;
use rifka\Http\Requests;
use rifka\Http\Controllers\CaseDetail\CaseDetailController;

class LayananDiberikanController extends CaseDetailController {

  /*
  |--------------------------------------------------------------------------
  | Services Given (Layanan Diberikan) Controller
  |--------------------------------------------------------------------------
  |
  | This controller handles functionality of layanan diberikan resources.
  |
  */

  /**
   * Show the form for creating a new Layanan Diberikan.
   *
   * @param Request $request
   * @param integer $kasus_id
   * @return Request
   */
  public function create(Request $request, $kasus_id)
  {
    $pageStatus = $_GET['jenis']."-baru";
    $request->session()->flash($pageStatus, True);
    return redirect()->route('kasus.show', [$kasus_id, '#layanan-diberikan']);
  }

}
