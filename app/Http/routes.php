<?php

// SITE ROOT
Route::get('/', ['as' => 'root', 'uses' => 'WelcomeController@index']);

// *** PROCESSES ***
	// Search
	Route::post('klien/search', 'KlienController@search');
	Route::post('kasus/search', 'KasusController@search');
	
	// Administrasi
	Route::get('administrasi', ['as' => 'administrasi', 'uses' => 'AdministrasiController@index']);
	
	// Konseling
	Route::get('konseling', ['as' => 'konseling', 'uses' => 'KonselingController@index']);
	
	// Men's Program
	Route::get('mensprogram', ['as' => 'mensprogram', 'uses' => 'MensProgramController@index']);

// *** RESOURCES ***
	Route::resource('kasus', 'KasusController');
	Route::resource('klien', 'KlienController');
	Route::resource('arsip', 'ArsipController');
	Route::resource('alamat', 'AlamatController');
	Route::resource('kasus.bentuk', 'BentukKekerasanController');


// *** AUTHENTICATION ***
	Route::get('home', 'HomeController@index');
	Route::controllers([
		'auth' => 'Auth\AuthController',
		'password' => 'Auth\PasswordController',
	]);

// *** DEVELOPER ***
	// Developer Routes
	Route::get('/kamus', ['as' => 'kamus', 'uses' => 'KamusController@index']);
	Route::get('/developer', 'DeveloperController@index');
