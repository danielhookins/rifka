<?php

namespace rifka\Http\Controllers;

use Illuminate\Http\Request;

use rifka\Http\Requests;
use rifka\Http\Controllers\Controller;
use rifka\Kasus;
use rifka\Klien;
use rifka\Alamat;
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
        
        // Prepare Data for Overview
        $overview = array();
        $year = Carbon::today()->format('Y');
        $month = Carbon::today()->format('m');

        // Case Data
        // Cases this year
        $casesThisYear = Kasus::where(DB::raw('YEAR(created_at)'), '=', $year)->count();
        // Cases last year
        $casesLastYear = Kasus::where(DB::raw('YEAR(created_at)'), '=', ($year - 1))->count();
        // Cases this month
        $casesThisMonth = Kasus::where(DB::raw('MONTH(created_at)'), '=', $month)
        ->where(DB::raw('YEAR(created_at)'), '=', $year)
        ->count();
        // Cases this month last year
        $casesThisMonthLastYear = Kasus::where(DB::raw('MONTH(created_at)'), '=', $month)
        ->where(DB::raw('YEAR(created_at)'), '=', ($year - 1))
        ->count();
        // Data for cases by month graph
        $casesByMonth = LaporanUtils::getKasusBulanArray($year);

        // Client Data
        // Clients this year
        $clientsThisYear = count(LaporanUtils::getKlien($year, "Semua"));
        // Clients last year
        $clientsLastYear = count(LaporanUtils::getKlien(($year - 1), "Semua"));
        // Survivors by case type
        $survivorJenisKasus = LaporanUtils::getCountByCaseType(
            LaporanUtils::getDistinctCaseTypes(), $year);

        $overview["thisYear"] = $year;
        $overview["thisMonth"] = $month;
        $overview["casesThisYear"] = $casesThisYear;
        $overview["casesLastYear"] = $casesLastYear;
        $overview["casesThisMonth"] = $casesThisMonth;
        $overview["casesThisMonthLastYear"] = $casesThisMonthLastYear;
        $overview["clientsThisYear"] = $clientsThisYear;
        $overview["clientsLastYear"] = $clientsLastYear;
        $overview["survivorJenisKasus"] = $survivorJenisKasus;
        $overview["casesByMonth"] = $casesByMonth;

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

    public function kabupaten()
    {
        $tahun = Carbon::today()->format('Y');
        $jenisKlien = "Korban";
        $jenisAlamat = "Domisili";

        $kabupaten = LaporanUtils::getKabupaten($tahun, $jenisKlien, $jenisAlamat);

        return view('laporan.index')
            ->with('laporan', 'kabupaten')
            ->with('year', $tahun)
            ->with('title', "Data Kabupaten")
            ->with('countArray', $kabupaten);

    }

    public function updateKabupaten()
    {
        // Year
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

        // TODO Client Type
        $jenisKlien = "Korban";

        // TODO Address Type
        $jenisAlamat = "Domisili";

        // Update array
        $kabupaten = LaporanUtils::getKabupaten($year, $jenisKlien, $jenisAlamat);

        return view('laporan.index')
            ->with('laporan', 'kabupaten')
            ->with('year', $year)
            ->with('title', "Data Kabupaten")
            ->with('countArray', $kabupaten);
    }

    public function test()
    {
        dd("test");
    }

}
