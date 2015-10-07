<?php

namespace rifka\Http\Controllers;

use Illuminate\Http\Request;

use rifka\Http\Requests;
use rifka\Http\Controllers\Controller;
use rifka\Kasus;
use rifka\Klien;
use rifka\Alamat;
use rifka\Library\LaporanUtils;
use rifka\Library\DateUtils;
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
        
        $overview = LaporanUtils::getOverview();

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
        $year = LaporanUtils::getUpdatedYear(\Input::get());

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
        $year = LaporanUtils::getUpdatedYear(\Input::get());

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
        $year = LaporanUtils::getUpdatedYear(\Input::get());

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

    public function kasusTahun()
    {
        $tahun = Carbon::today()->format('Y');
        $months = DateUtils::getMonths();

        $kasusBulan = LaporanUtils::getKasusBulanArray($tahun);

        return view('laporan.index')
            ->with('laporan', 'kasus-tahun')
            ->with('year', $tahun)
            ->with('month', $months)
            ->with('countArray', $kasusBulan);
    }

    public function updateKasusTahun()
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

        $months = DateUtils::getMonths();

        $kasusBulan = LaporanUtils::getKasusBulanArray($year);

        return view('laporan.index')
            ->with('laporan', 'kasus-tahun')
            ->with('year', $year)
            ->with('month', $months)
            ->with('countArray', $kasusBulan);

    }

    public function test()
    {
        dd("test");
    }

}
