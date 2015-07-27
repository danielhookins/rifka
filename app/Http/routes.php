<?php

// *** SITE SECTIONS ***
	
	// Site root
	Route::get('/', [
		'as' => 'root', 
		'uses' => 'WelcomeController@index']);

// *** RESOURCES ***
	
	Route::resource('kasus', 'KasusController');
	Route::resource('kasus.perkembangan', 'PerkembanganController');
	Route::resource('kasus.bentuk', 'BentukKekerasanController');
	Route::resource('klien', 'KlienController');
	Route::resource('arsip', 'ArsipController');
	Route::resource('alamat', 'AlamatController');
	Route::resource('konselor', 'KonselorController');
	

// *** SEARCH ***
	
	// Display the main serach page
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
	Route::post('alamat/search', [
		'as'		=> 'alamat.search',
		'uses'	=> 'AlamatController@search']);
	Route::post('konselor/search', [
		'as' 		=> 'konselor.search',
		'uses' 	=> 'Search\SearchController@searchKonselor']);

// *** KASUS ***
	
	// Add a client to a case
	// TODO: Do this in a more secure way
	Route::get('kasus/{kasus_id}/tambahKlien/{klien_id}', [
		'as' => 'tambah.kasus.klien', 
		'uses' => 'KasusController@tambahKasusKlien']);
	Route::get('kasus/{kasus_id}/tambahKonselor/{konselor_id}', [
		'as' => 'tambah.kasus.konselor', 
		'uses' => 'KasusController@tambahKasusKonselor']);
	
	// Show Add Victim or Add Perp Sections to New/Edit Case forms.
	Route::get('tambahKlien/{type}', [
		'as' => 'tambah.klien',
		'uses' => 'KasusController@tambahKlien']);
	// Show Add Konselor Sections to Edit Case forms.
	Route::get('tambahKonselor', [
		'as' => 'tambah.konselor',
		'uses' => 'KasusController@tambahKonselor']);
	
	// SeshPushKlien
	Route::get('seshPushKlien/{klien_id}/{jenis}', [
		'as' => 'seshPushKlien',
		'uses' => 'KasusController@seshPushKlien']);
	
	// SeshRemoveKlien
	Route::post('seshRemoveKlien', [
		'as' => 'seshRemoveKlien',
		'uses' => 'KasusController@seshRemoveKlien']);

	// Edit a certain section
	Route::get('kasus/{kasus_id}/edit/{section}', [
		'as' => 'kasus.edit',
		'uses' => 'KasusController@edit']);
	
	// Display changes to a case
	Route::get('kasus/{kasus_id}/changes', [
		'as' => 'kasus.changes',
		'uses' => 'ChangeLogController@showCaseChanges']);

	// Show the delete case dialog
	Route::get('kasus/{kasus_id}/delete', [
		'as' => 'kasus.delete',
		'uses' => "KasusController@confirmDestroy"]);
	
	// Use Ajax to automatically update case information
	Route::post('kasus/{kasus_id}/autoUpdate', [
		'as' => 'kasus.autoupdate',
		'uses' => "KasusController@autoUpdate"]);

	// Remove client from case
	Route::post('kasus/{kasus_id}/removeklien2', [
		'as' => 'klien2kasus.delete',
		'uses' => 'KasusController@deleteKlien2Kasus']);
	// Remove counsellor from case
	Route::post('kasus/{kasus_id}/removekonselor2', [
		'as' => 'konselor2kasus.delete',
		'uses' => 'KasusController@deleteKonselor2Kasus']);

	// Delete case developments
	Route::post('kasus/{kasus_id}/removeperkembangan2', [
		'as' => 'perkembangan2.delete',
		'uses' => 'perkembanganController@deletePerkembangan2']);

// *** KLIEN ***
	
	// Edit a certain section
	Route::get('klien/{klien_id}/edit/{section}', [
		'as' => 'klien.edit',
		'uses' => 'KlienController@edit']);
	
	// Display changes to a client profile
	Route::get('klien/{klien_id}/changes', [
		'as' => 'klien.changes',
		'uses' => 'ChangeLogController@showClientChanges']);

	// Show the delete client dialog
	Route::get('klien/{klien_id}/delete', [
		'as' => 'klien.delete',
		'uses' => "KlienController@confirmDestroy"]);

// *** KONSELOR ***
	// Delete counselors
	Route::post('deleteKonselor2', [
		'as' => 'konselor2.delete',
		'uses' => 'KonselorController@deleteKonselor2']);

// *** USER ***
	
	// Auth controllers
	Route::controllers([
		'auth' => 'Auth\AuthController',
		'password' => 'Auth\PasswordController']);
	
	// Log a user out
	Route::get('logout', [
		'as' => 'logout', 
		function() 
		{
			Auth::logout();
			return redirect('/');
		}]);

	// User specific Home
	Route::get('home', [
		'as' => 'home', 
		'uses' => 'HomeController@index']);

	// User Profile
	Route::get('user/{user_id}', [
		'as' => 'user.show',
		'uses' => 'UserController@show']);

// *** DEVELOPER ***
	// Show the data dictionary
	Route::get('/kamus', [
		'as' => 'kamus', 
		'uses' => 'KamusController@index']);

	Route::get('/developer', [
		'middleware' => 'auth', 
		'as' => 'developer',
		'uses' => 'DeveloperController@index']);

		Route::get('/developer/test', [
		'middleware' => 'auth', 
		'as' => 'developer.test',
		'uses' => 'DeveloperController@test']);
