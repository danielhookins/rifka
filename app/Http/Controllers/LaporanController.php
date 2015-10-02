<?php

namespace rifka\Http\Controllers;

use Illuminate\Http\Request;

use rifka\Http\Requests;
use rifka\Http\Controllers\Controller;
use rifka\Kasus;
use rifka\Klien;
use rifka\Library\LaporanUtils;
use Carbon\Carbon;
use Khill\Lavacharts\Lavacharts;
use DB;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        
        $year = Carbon::today()->format('Y');
        $overview = array();

        $cases = Kasus::all()->count();
        $casesThisYear = Kasus::where(DB::raw('YEAR(created_at)'), '=', $year)
            ->count();;
        $perempuan = Klien::where('kelamin', 'Perempuan')->count();
        $laki2 = Klien::where('kelamin', 'Laki-laki')->count();
        $clients = (int)$perempuan + (int)$laki2;

        $overview["thisYear"] = $year;
        $overview["casesThisYear"] = $casesThisYear;
        $overview["cases"] = $cases;
        $overview["perempuan"] = $perempuan;
        $overview["laki2"] = $laki2;
        $overview["clients"] = $clients;

        return view('laporan.index')
            ->with('overview', $overview);
    }

    public function kasusOlehJenis()
    {
        $year = Carbon::today()->format('Y');
        $countArray = LaporanUtils::getCountByCaseType(
            LaporanUtils::getDistinctCaseTypes(), $year);

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

        $countArray = LaporanUtils::getCountByCaseType(
            LaporanUtils::getDistinctCaseTypes(), $year);

        return view('laporan.index')
            ->with('laporan', "jenis-kasus")
            ->with('year', $year)
            ->with('countArray', $countArray)
            ->with('title', "Jenis Kasus untuk " . $year);
    }

    public function listKasusOlehTahun()
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

    public function updateListKasusOlehTahun()
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

        // TODO: Duplicate code -- move to library
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


    public function test()
    {
        //
        dd(LaporanUtils::getCountByCaseType(
            LaporanUtils::getDistinctCaseTypes(), 2015
            )
        );
    }

}
