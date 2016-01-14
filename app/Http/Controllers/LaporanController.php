<?php namespace rifka\Http\Controllers;

use Illuminate\Http\Request;
use rifka\Http\Requests;
use rifka\Http\Controllers\Controller;
use rifka\Library\LaporanUtils;

class LaporanController extends Controller
{
    /**
     * Overview page
     * @return Overview view
     */
    public function index()
    {
        
        $overview = LaporanUtils::getOverview();

        return view('laporan.index')
            ->with('overview', $overview);
    }

}
