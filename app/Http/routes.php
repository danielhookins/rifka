<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');

Route::get('/kamus', 'KamusController@index');

// Processes
Route::get('/administrasi', 'AdministrasiController@index');
Route::get('/konseling', 'KonselingController@index');
Route::get('/mensprogram', 'MensProgramController@index');


// Developer Routes
Route::get('/developer', 'DeveloperController@index');
Route::get('/changelog', 'DeveloperController@changelog');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
