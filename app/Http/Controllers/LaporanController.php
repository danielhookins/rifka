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
use rifka\Library\ExcelUtils;
use rifka\Library\LaporanExport;
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

    /**
     *  Display a list of cases by age group
     */
    public function listKlienOlehUsia()
    {
        // Set variable defaults
        $year = Carbon::today()->format('Y');
        $age = "dewasa";
        $caseType = "all";

        $displayModel = array();
        $displayModel["year"] = $year;
        $displayModel["age"] = $age;

        // Retrieve clients
        $clients = LaporanUtils::getCaseClientsByAge($year, $caseType);

        return view('laporan.index')
            ->with('list', "usia")
            ->with('displayModel', $displayModel)
            ->with('klien2', $clients[$age]);
    }

    public function updateListKlienOlehUsia() {
        $input = \Input::get();
        $year = LaporanUtils::getUpdatedYear(\Input::get());
        $age = $input["age"];
        $caseType = "all";
        
        $displayModel = array();
        $displayModel["year"] = $year;
        $displayModel["age"] = $age;

        // Retrieve clients
        $clients = LaporanUtils::getCaseClientsByAge($year, $caseType);

        return view('laporan.index')
            ->with('list', "usia")
            ->with('displayModel', $displayModel)
            ->with('klien2', $clients[$age]);
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

    public function kasusPerBulan()
    {
        $tahun = Carbon::today()->format('Y');
        $months = DateUtils::getMonths();
        $kasusBulan = LaporanUtils::getKasusBulanArray($tahun);

        return view('laporan.index')
            ->with('laporan', 'kasus-per-bulan')
            ->with('year', $tahun)
            ->with('month', $months)
            ->with('countArray', $kasusBulan);
    }

    public function updateKasusPerBulan()
    {
        $year = LaporanUtils::getUpdatedYear(\Input::get());
        $months = DateUtils::getMonths();
        $kasusBulan = LaporanUtils::getKasusBulanArray($year);

        return view('laporan.index')
            ->with('laporan', 'kasus-per-bulan')
            ->with('year', $year)
            ->with('month', $months)
            ->with('countArray', $kasusBulan);
    }

    public function kasusOlehUsia()
    {
        $year = Carbon::today()->format('Y');
        $usia = LaporanUtils::getCaseClientsByAge($year);

        $typeCases = array();
        foreach(LaporanUtils::getDistinctCaseTypes($year) as $type)
        {
            $typeCases[$type] = LaporanUtils::getCaseClientsByAge($year, $type);
        }

        return view('laporan.index')
            ->with('laporan', 'usia')
            ->with('year', $year)
            ->with('usia', $usia)
            ->with('typeCases', $typeCases);
    }

    public function updateKasusOlehUsia()
    {
        $year = LaporanUtils::getUpdatedYear(\Input::get());
        $usia = LaporanUtils::getCaseClientsByAge($year);

        $typeCases = array();
        foreach(LaporanUtils::getDistinctCaseTypes($year) as $type)
        {
            $typeCases[$type] = LaporanUtils::getCaseClientsByAge($year, $type);
        }

        return view('laporan.index')
            ->with('laporan', 'usia')
            ->with('year', $year)
            ->with('usia', $usia)
            ->with('typeCases', $typeCases);
    }

    /**
     * Export case by age and type data to Excel
     */
    public function exporLaporanUsiaXLS() {
        $input = \Input::get();
        $years = array();

        if($input["mulai"] == "" && $input["sampai"] == "")
        {
            // no input given
            return redirect()->route('laporan.usia');
        } else if ($input["mulai"] == "" || $input["sampai"] == "") {
            $years[] = ($input["mulai"] != "") 
                ? $input["mulai"] : $input["sampai"];
        } else {
            
            for ($i = (int)$input["mulai"]; $i <= (int)$input["sampai"]; $i++) {
                $years[] = $i;
            }
        }

        LaporanExport::kasusOlehUsia($years);
    }
    

    public function test()
    {
        return "test";
    }
}
