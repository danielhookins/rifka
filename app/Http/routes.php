<?php

// *** SITE SECTIONS ***
	
	// Site root
	Route::get('/', [
		'as' => 'root', 
		'uses' => 'WelcomeController@index']);

	// User specific Home
	Route::get('home', [
		'as' => 'home', 
		'uses' => 'HomeController@index']);

// *** RESOURCES ***
	
	Route::resource('kasus', 'KasusController');
	Route::resource('klien', 'KlienController');
	Route::resource('arsip', 'ArsipController');
	Route::resource('alamat', 'AlamatController');
	Route::resource('kasus.bentuk', 'BentukKekerasanController');

// *** SEARCH ***
	
	Route::get('search', [
		'as'	=> 'search',
		'uses'	=> 'SearchController@index']);
	Route::post('search', [
		'as' 	=> 'search', 
		'uses'  => 'SearchController@search']);
	Route::post('klien/search', 'Klien\SearchController@searchKlien');
	Route::post('kasus/search', 'KasusController@search');
	Route::post('alamat/search', 'AlamatController@search');

// *** KASUS ***
	
	// Add a client to a case
	Route::get('kasus/{kasus_id}/tambah/{klien_id}', [
		'as' => 'tambah.kasus.klien', 
		'uses' => 'KasusController@tambahKasusKlien']);
	
	// Show Add Victim or Add Perp Sections to New Case form.
	Route::get('tambahKlien/{type}', [
		'as' => 'tambah.klien',
		'uses' => 'KasusController@tambahKlien']);
	
	// SeshPushKlien
	Route::get('seshPushKlien/{klien_id}/{jenis}', [
		'as' => 'seshPushKlien',
		'uses' => 'KasusController@seshPushKlien']);
	
	// SeshRemoveKlien
	Route::post('seshRemoveKlien', [
		'as' => 'seshRemoveKlien',
		'uses' => 'KasusController@seshRemoveKlien']);

	// Edit a certain section
	Route::get('kasus/{kasus_id}/edit/{section}', [
		'as' => 'kasus.edit',
		'uses' => 'KasusController@edit']);
	
	// Display changes to a case
	Route::get('kasus/{kasus_id}/changes', [
		'as' => 'kasus.changes',
		'uses' => 'ChangeLogController@showCaseChanges']);

// *** KLIEN ***
	
	// Edit a certain section
	Route::get('klien/{klien_id}/edit/{section}', [
		'as' => 'klien.edit',
		'uses' => 'KlienController@edit']);
	
	// Display changes to a client profile
	Route::get('klien/{klien_id}/changes', [
		'as' => 'klien.changes',
		'uses' => 'ChangeLogController@showClientChanges']);

// *** AUTHENTICATION ***
	
	// Auth controllers
	Route::controllers([
		'auth' => 'Auth\AuthController',
		'password' => 'Auth\PasswordController']);
	
	// Log a user out
	Route::get('logout', [
		'middleware' => 'auth', 
		'as' => 'logout', 
		function() 
		{
			Auth::logout();
			return redirect('/');
		}]);

// *** DEVELOPER ***
	// Show the data dictionary
	Route::get('/kamus', [
		'as' => 'kamus', 
		'uses' => 'KamusController@index']);

	Route::get('/developer', [
		'middleware' => 'auth', 
		'as' => 'developer',
		'uses' => 'DeveloperController@index']);
