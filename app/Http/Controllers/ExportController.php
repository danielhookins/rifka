<?php namespace rifka\Http\Controllers;

use Illuminate\Http\Request;
use rifka\Http\Requests;
use rifka\Http\Controllers\Controller;
use rifka\Library\LaporanExport;
use rifka\Library\InputUtils;

class ExportController extends Controller
{
	
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
