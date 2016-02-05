<?php namespace rifka\Http\Controllers;

use Illuminate\Http\Request;
use rifka\Http\Requests;
use rifka\Http\Controllers\Controller;

class LitigasiController extends Controller
{
    /**
     * Show the form for creating a new Litigasi record.
     */
    public function create(Request $request, $kasus_id)
    {
        $pageStatus = $_GET['jenis']."-baru";
        $request->session()->flash($pageStatus, True);

        return redirect()->route('kasus.show', [$kasus_id, '#litigasi']);
    }

}
