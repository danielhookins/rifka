<?php

// SITE ROOT
Route::get('/', ['as' => 'root', 'uses' => 'WelcomeController@index']);

// *** RESOURCES ***
	Route::resource('kasus', 'KasusController');
	Route::resource('klien', 'KlienController');
	Route::resource('arsip', 'ArsipController');
	Route::resource('alamat', 'AlamatController');
	Route::resource('kasus.bentuk', 'BentukKekerasanController');

// *** PROCESSES ***
	// Search
	Route::get('search', [
			'middleware' => 'auth', 
			'as'	=> 'search',
			'uses'	=> 'SearchController@index'
		]);
	Route::post('search', [
			'middleware' => 'auth', 
			'as' 	=> 'search', 
			'uses'  => 'SearchController@search'
		]);
	Route::post('klien/search', 'KlienController@search');
	Route::post('kasus/search', 'KasusController@search');
	Route::post('alamat/search', 'AlamatController@search');
	
	// Administrasi
	Route::get('administrasi', [
			'middleware' => 'auth', 
			'as' => 'administrasi', 
			'uses' => 'AdministrasiController@index'
		]);
	
	// Konseling
	Route::get('konseling', [
			'middleware' => 'auth', 
			'as' => 'konseling', 
			'uses' => 'KonselingController@index'
		]);
	
	Route::get('kasus/create/page={page_id}', [
			'as' => 'kasus.create-page',
			'uses' => 'KasusController@showCreatePage'
		]);

	// KASUS
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
	
	// Men's Program
	Route::get('mensprogram', [
			'middleware' => 'auth', 
			'as' => 'mensprogram', 
			'uses' => 'MensProgramController@index'
		]);


// *** AUTHENTICATION ***
	Route::get('home', [
			'middleware' => 'auth', 
			'as' => 'home', 
			'uses' => 'HomeController@index'
		]);
	Route::controllers([
			'auth' => 'Auth\AuthController',
			'password' => 'Auth\PasswordController',
	]);
	Route::get('logout', [
			'middleware' => 'auth', 
			'as' => 'logout', 
			function() {
					Auth::logout();
					return redirect('/');
			}
		]);

// *** DEVELOPER ***
	// Developer Routes
	Route::get('/kamus', [
			'middleware' => 'auth', 
			'as' => 'kamus', 
			'uses' => 'KamusController@index'
		]);
	Route::get('/developer', [
			'middleware' => 'auth', 
			'as' => 'developer',
			'uses' => 'DeveloperController@index'
		]);
