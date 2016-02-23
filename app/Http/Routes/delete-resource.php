<?php 

	// Delete multiple case details
	Route::post('kasus/{kasus_id}/deleteSelected/{model}/{primaryKey?}', [
		'as' => 'selectedDetails.delete',
		'uses' => 'CaseDetail\CaseDetailController@deleteSelectedDetails'
		]);

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
