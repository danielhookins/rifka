<?php 	// Search related routes

	// General
	Route::get('search', [
		'as'		=> 'search',
		'uses'	=> 'Search\SearchController@index']);
	Route::post('search', [
		'as' 		=> 'search', 
		'uses'  => 'Search\SearchController@search']);
	
	// Case
	Route::get('search/kasus', [
		'as'		=> 'search.kasus',
		'uses'	=> 'Search\SearchController@searchKasus']);
	Route::post('search/kasus', [
		'as'		=> 'search.kasus',
		'uses'	=> 'Search\SearchController@search']);

	// Client
	Route::get('search/klien', [
		'as'		=> 'search.klien',
		'uses'	=> 'Search\SearchController@searchKlien']);
	Route::post('search/klien', [
		'as'		=> 'search.klien',
		'uses'	=> 'Search\SearchController@search']);
	
	// Counsellor
	Route::post('konselor/search', [
		'as' 		=> 'konselor.search',
		'uses' 	=> 'Search\SearchController@searchKonselor']);
