<?php

	// Search related routes
	
	// Display the main search page
	Route::get('search', [
		'as'		=> 'search',
		'uses'	=> 'SearchController@index']);

	// Post search queries to:
	Route::post('search', [
		'as' 		=> 'search', 
		'uses'  => 'SearchController@search']);
	
	Route::post('kasus/search', [
		'as'		=> 'kasus.search',
		'uses'	=> 'KasusController@search']);
	
	Route::post('klien/search', [
		'as'		=> 'klien.search',
		'uses'	=> 'Search\SearchController@searchKlien']);
	
	Route::post('konselor/search', [
		'as' 		=> 'konselor.search',
		'uses' 	=> 'Search\SearchController@searchKonselor']);