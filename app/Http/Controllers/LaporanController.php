<?php

namespace rifka\Http\Controllers;

use Illuminate\Http\Request;

use rifka\Http\Requests;
use rifka\Http\Controllers\Controller;
use rikfa\Kasus;
use rifka\Library\LaporanUtils;
use Carbon\Carbon;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
        return view('laporan.index');
    }

    public function kasusOlehJenis()
    {
        
        $year = Carbon::today()->format('Y');
        $countArray = LaporanUtils::getKasusOlehJenis($year);

        return view('laporan.index')
            ->with('laporan', "jenis-kasus")
            ->with('year', $year)
            ->with('countArray', $countArray);
    }

    public function test()
    {
        dd('test');
    }

}
