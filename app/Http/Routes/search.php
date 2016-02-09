<?php 	// Search related routes
	
	// General
	Route::get('search', [
		'as'		=> 'search',
		'uses'	=> 'SearchController@index']);
	Route::post('search', [
		'as' 		=> 'search', 
		'uses'  => 'SearchController@search']);
	
	// Case
	Route::get('search/kasus', [
		'as'		=> 'search.kasus',
		'uses'	=> 'Search\KasusSearchController@index']);
	Route::post('search/kasus', [
		'as'		=> 'search.kasus',
		'uses'	=> 'Search\KasusSearchController@search']);

	// Client
	Route::get('search/klien', [
		'as'		=> 'search.klien',
		'uses'	=> 'Search\KlienSearchController@index']);
	Route::post('search/klien', [
		'as'		=> 'search.klien',
		'uses'	=> 'Search\KlienSearchController@search']);
	
	// Counsellor
	Route::post('konselor/search', [
		'as' 		=> 'konselor.search',
		'uses' 	=> 'Search\SearchController@searchKonselor']);
