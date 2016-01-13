<?php

	// Excel (exporting) related routes
	
		/**
		 *	Export case information to an Excel file.
		 *
		 *	@param int kasus_id - The ID of the case 
		 */
		Route::get('kasus/{kasus_id}/exportXLS', [
			'as' => 'kasus.xls',
			'uses' => 'KasusController@exportXLS']);

		/**
		 * Export cases by age data to Excel
		 */
		Route::post('laporan/kasusOlehUsia/exportXLS', [
			'as' => 'kasusOlehUsia.xls',
			'uses' => 'ExportController@exporLaporanUsiaXLS']);

		/**
		 * Export cases by type data to Excel
		 */
		Route::post('laporan/kasusOlehJenis/exportXLS', [
			'as' => 'kasusOlehJenis.xls',
			'uses' => 'ExportController@exporLaporanJenisXLS']);