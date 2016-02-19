<?php

	/*
	|--------------------------------------------------------------------------
	| Search Routes
	|--------------------------------------------------------------------------
	|
	| This route group applies 'auth', 'active' and 'userType' middleware.
	|
	*/

	Route::group(['middleware' => [
									'auth', 
									'active', 
									'userType:Developer,Manager,Konselor,Media,Front Office']
								], function() {

		// General
		Route::get('search', [
			'as'		=> 'search',
			'uses'	=> 'Search\SearchController@index']);
		Route::post('search', [
			'as' 		=> 'search', 
			'uses'  => 'Search\SearchController@showResults']);
		
		// Case
		Route::get('search/kasus', [
			'as'		=> 'search.kasus',
			'uses'	=> 'Search\SearchController@searchKasus']);
		Route::post('search/kasus', [
			'as'		=> 'search.kasus',
			'uses'	=> 'Search\SearchController@showResults']);

		// Client
		Route::get('search/klien', [
			'as'		=> 'search.klien',
			'uses'	=> 'Search\SearchController@searchKlien']);
		Route::post('search/klien', [
			'as'		=> 'search.klien',
			'uses'	=> 'Search\SearchController@showResults']);
		
		// Counsellor
		Route::get('search/konselor', [
			'as' 		=> 'search.konselor',
			'uses' 	=> 'Search\SearchController@searchKonselor']);
		Route::post('search/konselor', [
			'as' 		=> 'search.konselor',
			'uses' 	=> 'Search\SearchController@showKonselorResults']);
	
	});
	