<?php

	/*
	|--------------------------------------------------------------------------
	| Laporan (Report) Routes
	|--------------------------------------------------------------------------
	|
	| This route group applies 'auth', 'active' and 'userType' middleware.
	|
	*/

	Route::group(['middleware' => [
									'auth', 
									'active', 
									'userType:Developer,Manager,Konselor,Media']
								], function() {

		// Index: Display form for generating a new report
		Route::get('/laporan', [
			'as' => 'laporan.index', 
			'uses' => 'LaporanController@index']);

		// Display generated report
		Route::post('/laporan', [
			'as' => 'laporan.lihat', 
			'uses' => 'LaporanController@lihat']);

	});
