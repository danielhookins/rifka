<?php

namespace rifka\Http\Controllers;

use Illuminate\Http\Request;

use rifka\Http\Requests;
use rifka\Http\Controllers\Controller;
use rikfa\Kasus;
use rifka\Library\LaporanUtils;
use Carbon\Carbon;
use Khill\Lavacharts\Lavacharts;

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
            ->with('countArray', $countArray)
            ->with('title', "Jenis Kasus untuk " . $year);;
    }

    public function updateKasusOlehJenis()
    {
        $year = \Input::get('year');
        
        if(\Input::get('change') != null)
        {
            if(\Input::get('change') == "prev")
            {
                $year = $year - 1;
            }
            elseif(\Input::get('change') == "next")
            {
                $year = $year + 1;
            }
        }

        $countArray = LaporanUtils::getKasusOlehJenis($year);

        return view('laporan.index')
            ->with('laporan', "jenis-kasus")
            ->with('year', $year)
            ->with('countArray', $countArray)
            ->with('title', "Jenis Kasus untuk " . $year);
    }

    public function test()
    {
        //
    }

}
