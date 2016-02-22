<?php

	// Delete related routes

	// Remove client from case
	Route::post('kasus/{kasus_id}/removeklien2', [
		'as' => 'klien2kasus.delete',
		'uses' => 'KasusController@deleteKlien2Kasus']);

	// Delete Alamat
	Route::post('klien/{klien_id}/removealamat2', [
		'as' => 'alamat2.delete',
		'uses' => 'Alamat\AlamatController@deleteAlamat2']);

	// Delete Counselors
	Route::post('deleteKonselor2', [
		'as' => 'konselor2.delete',
		'uses' => 'KonselorController@deleteKonselor2']);
	// Remove Counsellor from case
	Route::post('kasus/{kasus_id}/removekonselor2', [
		'as' => 'konselor2kasus.delete',
		'uses' => 'KasusController@deleteKonselor2Kasus']);
