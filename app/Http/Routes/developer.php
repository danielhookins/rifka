<?php

  /*
  |--------------------------------------------------------------------------
  | Developer Routes
  |--------------------------------------------------------------------------
  |
  | This route group applies 'auth', 'active' and 'userType' middleware.
  |
  */

  Route::group(['middleware' => [
                  'auth', 
                  'active', 
                  'userType:Developer']
                ], function() {
	
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

	});
	