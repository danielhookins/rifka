<?php
	
	// Application Routes

	Route::get('/', [
		'as' => 'root', 
		'uses' => 'WelcomeController@index']);

	Route::get('home', [
		'as' => 'home', 
		'uses' => 'HomeController@index']);

	Route::resource('konselor', 'KonselorController');

	Route::resource('user', 'UserController');

	// Require Route Files
	require_once('Routes/kasus.php');
	require_once('Routes/kasus-resource.php');

	require_once('Routes/klien-resource.php');
	require_once('Routes/klien.php');
	
	require_once('Routes/deletes.php');
	require_once('Routes/search.php');
	
	require_once('Routes/excel.php');
	require_once('Routes/user.php');
	
	require_once('Routes/laporan.php');

	require_once('Routes/developer.php');
	require_once('Routes/ETL.php');