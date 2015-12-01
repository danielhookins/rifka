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
use rifka\Library\InputUtils;
use Carbon\Carbon;
use DB;

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
        $year = InputUtils::getUpdatedYear(\Input::get());

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
        $year = InputUtils::getUpdatedYear(\Input::get());
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
        $year = InputUtils::getUpdatedYear(\Input::get());

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

    /**
     * [Report] Cases by Kabupaten
     * return view kabupaten
     */
    public function kabupaten()
    {
        $tahun = Carbon::today()->format('Y');
        $jenisKlien = "Korban";
        $jenisAlamat = "Domisili";

        $kabupaten = LaporanUtils::getKabupatenCount($tahun, $jenisKlien, $jenisAlamat);

        return view('laporan.index')
            ->with('laporan', 'kabupaten')
            ->with('year', $tahun)
            ->with('title', "Data Kabupaten")
            ->with('countArray', $kabupaten);
    }


    public function updateKabupaten()
    {
        $year = InputUtils::getUpdatedYear(\Input::get());

        // TODO: Add functionality in view to change Client Type
        $jenisKlien = "Korban";

        // TODO: Add functionality in view to change Address Type
        $jenisAlamat = "Domisili";

        // Update array
        $kabupaten = LaporanUtils::getKabupatenCount($year, $jenisKlien, $jenisAlamat);

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
        $year = InputUtils::getUpdatedYear(\Input::get());
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
        $year = InputUtils::getUpdatedYear(\Input::get());
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


    public function listKasusOlehJenis()
    {
        $year = Carbon::today()->format('Y');
        $caseType = "KTI";
        $availableTypes = LaporanUtils::getDistinctCaseTypes($year);

        $displayModel = array();
        $displayModel["year"] = $year;
        $displayModel["caseType"] = $caseType;
        $displayModel["availableTypes"] 
            = InputUtils::toSelectArray($availableTypes);
        
        $cases = LaporanUtils::getCasesByCaseType($caseType, $year);

        return view('laporan.index')
            ->with('list', "jenis-kasus")
            ->with('displayModel', $displayModel)
            ->with('cases', $cases)
            ->with('title', "Jenis Kasus untuk " . $year);
    }

    
    public function updateListKasusOlehJenis()
    {
        $year = InputUtils::getUpdatedYear(\Input::get());
        $caseType = \Input::get("caseType");
        $availableTypes = LaporanUtils::getDistinctCaseTypes($year);

        $displayModel = array();
        $displayModel["year"] = $year;
        $displayModel["caseType"] = $caseType;
        $displayModel["availableTypes"] 
            = InputUtils::toSelectArray($availableTypes);

        if($caseType == ""){$caseType = null;}        
        $cases = LaporanUtils::getCasesByCaseType($caseType, $year);

        return view('laporan.index')
            ->with('list', "jenis-kasus")
            ->with('displayModel', $displayModel)
            ->with('cases', $cases)
            ->with('title', "Jenis Kasus untuk " . $year);
    }


    public function listKasusOlehKabupaten()
    {
        $year = Carbon::today()->format('Y');
        $rows = LaporanUtils::getAlamatKorban($year);

        $displayModel = array();
        $displayModel["year"] = $year;

        return view('laporan.index')
            ->with('list', "kabupaten")
            ->with('displayModel', $displayModel)
            ->with('rows', $rows);
    }

    
    public function updateListKasusOlehKabupaten()
    {
        $year = InputUtils::getUpdatedYear(\Input::get());
        $rows = LaporanUtils::getAlamatKorban($year);

        $displayModel = array();
        $displayModel["year"] = $year;

        return view('laporan.index')
            ->with('list', "kabupaten")
            ->with('displayModel', $displayModel)
            ->with('rows', $rows);
    }


/***** Export *******/

    /**
     * Export case by age and type data to Excel
     */
    public static function exporLaporanUsiaXLS() {
        $input = \Input::get();
        $years = InputUtils::getYearsArrayFromInput($input);
        return LaporanExport::kasusOlehUsia($years);
    }

    /**
     * Export case by type data to Excel
     */
    public static function exporLaporanJenisXLS() {
        $input = \Input::get();
        $years = InputUtils::getYearsArrayFromInput($input);
        return LaporanExport::kasusOlehJenis($years);
    }
    
}
