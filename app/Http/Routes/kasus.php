<?php 
	// Case related routes

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