<?php

	// Developer related routes
	
	/**
	 *  Show the data dictionary.
	 */
	Route::get('/kamus', [
		'as' => 'kamus', 
		'uses' => 'KamusController@index']);

	Route::get('/developer', [
		'as' => 'developer',
		'uses' => 'DeveloperController@index']);

	Route::get('/developer/test', [
		'as' => 'developer.test',
		'uses' => 'DeveloperController@test']);

	Route::post('/developer/test', [
			'as' => 'test.post',
			'uses' => 'DeveloperController@postTest']);