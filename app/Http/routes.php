<?php

// SITE ROOT
Route::get('/', 'WelcomeController@index');

// *** PROCESSES ***
	// Administrasi
	Route::get('/administrasi', 'AdministrasiController@index');
	Route::get('/administrasi/new', 'AdministrasiController@newKlien');
	// Konseling
	Route::get('/konseling', 'KonselingController@index');
	// Men's Program
	Route::get('/mensprogram', 'MensProgramController@index');

// *** RESOURCES ***
	Route::resource('kasus', 'KasusController');


// *** AUTHENTICATION ***
	Route::get('home', 'HomeController@index');
	Route::controllers([
		'auth' => 'Auth\AuthController',
		'password' => 'Auth\PasswordController',
	]);

// *** DEVELOPER ***
	// Developer Routes
	Route::get('/kamus', 'KamusController@index');
	Route::get('/developer', 'DeveloperController@index');
	Route::get('/changelog', 'DeveloperController@changelog');
