<?php

	// REPORT ROUTES
	
	/* *** Temporarily disable other reports ***
		 *****************************************

	Route::get('/laporan', [
		'as' => 'laporan.index', 
		'uses' => 'LaporanController@index']);

	
	Route::get('/laporan/membuat', [
		'as' => 'laporan.membuat', 
		'uses' => 'LaporanController@membuat']);
	Route::post('/laporan/lihat', [
		'as' => 'laporan.lihat', 
		'uses' => 'LaporanController@lihat']);

	// Cases by Case Type
	Route::get('/laporan/kasusOlehJenis', [
		'as' => 'laporan.jenis-kasus', 
		'uses' => 'Laporan\KasusOlehJenisController@laporan']);
	Route::post('/laporan/kasusOlehJenis', [
		'as' => 'laporan.jenis-kasus.update', 
		'uses' => 'Laporan\KasusOlehJenisController@updateLaporan']);
	Route::get('/laporan/listKasusOlehJenis', [
		'as' => 'laporan.jenis.list',
		'uses' => 'Laporan\KasusOlehJenisController@daftar']);
	Route::post('/laporan/listKasusOlehJenis', [
		'as' => 'laporan.jenis.list.update',
		'uses' => 'Laporan\KasusOlehJenisController@updateDaftar']);

	
	// Cases by Year
	Route::get('/laporan/listKasusPerTahun', [
		'as' => 'laporan.tahun.list',
		'uses' => 'Laporan\KasusPerTahunController@daftar']);
	Route::post('/laporan/listKasusPerTahun', [
		'as' => 'laporan.tahun.list.update',
		'uses' => 'Laporan\KasusPerTahunController@updateDaftar']);

	// Cases by Month
	Route::get('/laporan/kasusPerBulan', [
		'as' => 'laporan.kasusPerBulan',
		'uses' => 'Laporan\KasusPerBulanController@laporan']);
	Route::post('/laporan/kasusPerBulan', [
		'as' => 'laporan.kasusPerBulan.update',
		'uses' => 'Laporan\KasusPerBulanController@updateLaporan']);


	// Cases by Victim Age (at time of case)
	Route::get('/laporan/usia', [
		'as' => 'laporan.usia',
		'uses' => 'Laporan\KasusOlehUsiaController@laporan']);
	Route::post('/laporan/usia', [
		'as' => 'laporan.usia.update',
		'uses' => 'Laporan\KasusOlehUsiaController@updateLaporan']);
	Route::get('/laporan/listKlienOlehUsia', [
		'as' => 'laporan.usia.list',
		'uses' => 'Laporan\KasusOlehUsiaController@daftar']);
	Route::post('/laporan/listKasusOlehUsia', [
		'as' => 'laporan.usia.list.update',
		'uses' => 'Laporan\KasusOlehUsiaController@updateDaftar']);


	// Cases by Regency (Kabupaten)
	Route::get('/laporan/kabupaten', [
		'as' => 'laporan.kabupaten',
		'uses' => 'Laporan\KasusOlehKabupatenController@laporan']);
	Route::post('/laporan/kabupaten', [
		'as' => 'laporan.kabupaten.update',
		'uses' => 'Laporan\KasusOlehKabupatenController@updateLaporan']);
	Route::get('/laporan/listKasusOlehKabupaten', [
		'as' => 'laporan.kabupaten.list',
		'uses' => 'Laporan\KasusOlehKabupatenController@daftar']);
	Route::post('/laporan/listKasusOlehKabupaten', [
		'as' => 'laporan.kabupaten.list.update',
		'uses' => 'Laporan\KasusOlehKabupatenController@daftar']);
*/

	Route::get('/laporan/index', [
		'as' => 'laporan.index', 
		'uses' => 'LaporanController@membuat']);

	Route::get('/laporan', [
		'as' => 'laporan.membuat', 
		'uses' => 'LaporanController@membuat']);

	Route::post('/laporan', [
		'as' => 'laporan.lihat', 
		'uses' => 'LaporanController@lihat']);