<?php

	// Delete related routes

	// Delete multiple case details
	Route::post('kasus/{kasus_id}/deleteSelected/{model}/{primaryKey?}', [
		'as' => 'selectedDetails.delete',
		'uses' => 'CaseDetailController@deleteSelectedDetails'
		]);

	// Remove client from case
	Route::post('kasus/{kasus_id}/removeklien2', [
		'as' => 'klien2kasus.delete',
		'uses' => 'KasusController@deleteKlien2Kasus']);
	// Remove counsellor from case
	Route::post('kasus/{kasus_id}/removekonselor2', [
		'as' => 'konselor2kasus.delete',
		'uses' => 'KasusController@deleteKonselor2Kasus']);

	// Delete efforts tried (upaya dilakukan)
	Route::post('kasus/{kasus_id}/removeupaya2', [
		'as' => 'upaya2.delete',
		'uses' => 'UpayaDilakukanController@deleteUpaya2']);

	// Delete LitigasiPidana Service given Record
	Route::post('kasus/{kasus_id}/removeLitigasiPidana2', [
		'as' => 'litigasiPidana2.delete',
		'uses' => 'LitigasiPidanaController@deleteLitigasiPidana2']);
	// Delete LitigasiPerdata Service given Record
	Route::post('kasus/{kasus_id}/removeLitigasiPerdata2', [
		'as' => 'litigasiPerdata2.delete',
		'uses' => 'LitigasiPerdataController@deleteLitigasiPerdata2']);
	// Delete Psycological counselling (konseling psikologi) Service given Record
	Route::post('kasus/{kasus_id}/removekons_psikologi2', [
		'as' => 'konsPsikologi2.delete',
		'uses' => 'KonsPsikologiController@deleteKonsPsikologi2']);
	// Delete Legal counselling (konseling hukum) Service given Record
	Route::post('kasus/{kasus_id}/removekons_hukum2', [
		'as' => 'konsHukum2.delete',
		'uses' => 'KonsHukumController@deleteKonsHukum2']);
	// Delete Homevisit Service given Record
	Route::post('kasus/{kasus_id}/removehomevisit2', [
		'as' => 'homevisit2.delete',
		'uses' => 'HomevisitController@deleteHomevisit2']);
	// Delete SupportGroup Service given Record
	Route::post('kasus/{kasus_id}/removesupportGroup2', [
		'as' => 'supportGroup2.delete',
		'uses' => 'SupportGroupController@deleteSupportGroup2']);
	// Delete MensProgram Service given Record
	Route::post('kasus/{kasus_id}/removemens_program2', [
		'as' => 'mensProgram2.delete',
		'uses' => 'MensProgramController@deleteMensProgram2']);
	// Delete Referral Record
	Route::post('kasus/{kasus_id}/removerujukan2', [
		'as' => 'rujukan2.delete',
		'uses' => 'RujukanController@deleteRujukan2']);
	// Delete Medical Service Record
	Route::post('kasus/{kasus_id}/removemedis2', [
		'as' => 'medis2.delete',
		'uses' => 'MedisController@deleteMedis2']);
	// Delete Mediation Service Record
	Route::post('kasus/{kasus_id}/removemediasi2', [
		'as' => 'mediasi2.delete',
		'uses' => 'MediasiController@deleteMediasi2']);
	// Delete Shelter Service Record
	Route::post('kasus/{kasus_id}/removeshelter2', [
		'as' => 'shelter2.delete',
		'uses' => 'ShelterController@deleteShelter2']);
	// Delete Alamat
	Route::post('klien/{klien_id}/removealamat2', [
		'as' => 'alamat2.delete',
		'uses' => 'Alamat\AlamatController@deleteAlamat2']);
	// Delete counselors
	Route::post('deleteKonselor2', [
		'as' => 'konselor2.delete',
		'uses' => 'KonselorController@deleteKonselor2']);
	// Delete client symptoms
	Route::post('kasus/{kasus_id}/removesymptom2', [
		'as' => 'symptom2.delete',
		'uses' => 'SymptomController@deleteSymptom2']);