<?php

	// Report related routes
	
	/**
	 * Display the index of reports.
	 */
	Route::get('/laporan', [
		'as' => 'laporan.index', 
		'uses' => 'LaporanController@index']);

	/**
	 * Report: [GET] Number of cases by type.
	 */
	Route::get('/laporan/kasusOlehJenis', [
		'as' => 'laporan.jenis-kasus', 
		'uses' => 'LaporanController@kasusOlehJenis']);

	/**
	 * Report: [POST] Update number of cases by type.
	 */
	Route::post('/laporan/kasusOlehJenis', [
		'as' => 'laporan.jenis-kasus.update', 
		'uses' => 'LaporanController@updateKasusOlehJenis']);

	/**
	 * List: [GET] Cases by year
	 */
	Route::get('/laporan/listKasusOlehTahun', [
		'as' => 'laporan.tahun.list',
		'uses' => 'LaporanController@listKasusOlehTahun']);

	/**
	 * List: [POST] Update cases by year
	 */
	Route::post('/laporan/listKasusOlehTahun', [
		'as' => 'laporan.tahun.list.update',
		'uses' => 'LaporanController@updateListKasusOlehTahun']);

	/**
	 * List: [GET] Cases by case-type
	 */
	Route::get('/laporan/listKasusOlehJenis', [
		'as' => 'laporan.jenis.list',
		'uses' => 'LaporanController@listKasusOlehJenis']);

	/**
	 * List: [POST] Update cases by case-type
	 */
	Route::post('/laporan/listKasusOlehJenis', [
		'as' => 'laporan.jenis.list.update',
		'uses' => 'LaporanController@updateListKasusOlehJenis']);

	/**
	 * List: [GET] Cases by age
	 */
	Route::get('/laporan/listKlienOlehUsia', [
		'as' => 'laporan.usia.list',
		'uses' => 'LaporanController@listKlienOlehUsia']);

	/**
	 * List: [POST] Update cases by age
	 */
	Route::post('/laporan/listKasusOlehUsia', [
		'as' => 'laporan.usia.list.update',
		'uses' => 'LaporanController@updateListKlienOlehUsia']);

	/**
	 * Report: [GET] Kabupaten report
	 */
	Route::get('/laporan/kabupaten', [
		'as' => 'laporan.kabupaten',
		'uses' => 'LaporanController@kabupaten']);

	/**
	 * Report: [POST] Update Kabupaten report
	 */
	Route::post('/laporan/kabupaten', [
		'as' => 'laporan.kabupaten.update',
		'uses' => 'LaporanController@updateKabupaten']);

	/**
	 * List: [GET] Cases by Kabupaten
	 */
	Route::get('/laporan/listKasusOlehKabupaten', [
		'as' => 'laporan.kabupaten.list',
		'uses' => 'LaporanController@listKasusOlehKabupaten']);

	/**
	 * List: [POST] Update cases by Kabupaten
	 */
	Route::post('/laporan/listKasusOlehKabupaten', [
		'as' => 'laporan.kabupaten.list.update',
		'uses' => 'LaporanController@updateListKasusOlehKabupaten']);

	/**
	 * Report: [GET] Cases by month report
	 */
	Route::get('/laporan/kasusPerBulan', [
		'as' => 'laporan.kasusPerBulan',
		'uses' => 'LaporanController@kasusPerBulan']);

	/**
	 * Report: [POST] Update Cases by month report
	 */
	Route::post('/laporan/kasusPerBulan', [
		'as' => 'laporan.kasusPerBulan.update',
		'uses' => 'LaporanController@updateKasusPerBulan']);

	/**
	 * Report: [GET] Usia report
	 */
	Route::get('/laporan/usia', [
		'as' => 'laporan.usia',
		'uses' => 'LaporanController@kasusOlehUsia']);

	/**
	 * Report: [POST] Update Usia report
	 */
	Route::post('/laporan/usia', [
		'as' => 'laporan.usia.update',
		'uses' => 'LaporanController@updateKasusOlehUsia']);

	/**
	 * Report: [GET] Number of cases by type for kabupaten and age.
	 */
	Route::get('/laporan/jenisKasusOlehKabupatenUsia', [
		'as' => 'laporan.kab-usia-jenis', 
		'uses' => 'LaporanController@jumlahJenisKasusOlehKabupatenUsia']);
