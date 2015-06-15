<?php

// SITE ROOT
Route::get('/', ['as' => 'root', 'uses' => 'WelcomeController@index']);

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
			'uses' => 'KonselingController@index
		']);
	
	// Men's Program
	Route::get('mensprogram', [
			'middleware' => 'auth', 
			'as' => 'mensprogram', 
			'uses' => 'MensProgramController@index'
		]);

// *** RESOURCES ***
	Route::resource('kasus', 'KasusController');
	Route::resource('klien', 'KlienController');
	Route::resource('arsip', 'ArsipController');
	Route::resource('alamat', 'AlamatController');
	Route::resource('kasus.bentuk', 'BentukKekerasanController');


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
