<?php 

	// Delete multiple case details
	Route::post('kasus/{kasus_id}/deleteSelected/{model}/{primaryKey?}', [
		'as' => 'selectedDetails.delete',
		'uses' => 'CaseDetail\CaseDetailController@deleteSelectedDetails'
		]);

	// Delete Legal counselling (konseling hukum) Service given Record
	Route::post('kasus/{kasus_id}/removekons_hukum2', [
		'as' => 'konsHukum2.delete',
		'uses' => 'CaseDetail\KonsHukumController@deleteKonsHukum2']);
	// Delete Psycological counselling (konseling psikologi) Service given Record
	Route::post('kasus/{kasus_id}/removekons_psikologi2', [
		'as' => 'konsPsikologi2.delete',
		'uses' => 'CaseDetail\KonsPsikologiController@deleteKonsPsikologi2']);
	// Delete LitigasiPidana Service given Record
	Route::post('kasus/{kasus_id}/removeLitigasiPidana2', [
		'as' => 'litigasiPidana2.delete',
		'uses' => 'CaseDetail\LitigasiPidanaController@deleteLitigasiPidana2']);
	// Delete LitigasiPerdata Service given Record
	Route::post('kasus/{kasus_id}/removeLitigasiPerdata2', [
		'as' => 'litigasiPerdata2.delete',
		'uses' => 'CaseDetail\LitigasiPerdataController@deleteLitigasiPerdata2']);
	// Delete SupportGroup Service given Record
	Route::post('kasus/{kasus_id}/removesupportGroup2', [
		'as' => 'supportGroup2.delete',
		'uses' => 'CaseDetail\SupportGroupController@deleteSupportGroup2']);
	// Delete MensProgram Service given Record
	Route::post('kasus/{kasus_id}/removemens_program2', [
		'as' => 'mensProgram2.delete',
		'uses' => 'CaseDetail\MensProgramController@deleteMensProgram2']);
	// Delete Shelter Service Record
	Route::post('kasus/{kasus_id}/removeshelter2', [
		'as' => 'shelter2.delete',
		'uses' => 'CaseDetail\ShelterController@deleteShelter2']);
