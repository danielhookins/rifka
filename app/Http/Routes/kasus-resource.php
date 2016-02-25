<?php 

  /*
  |--------------------------------------------------------------------------
  | Case (Kasus) Resource Routes
  |--------------------------------------------------------------------------
  |
  | This route group applies 'auth', 'active' and 'userType' middleware.
  |
  */

  Route::group(['middleware' => [
                  'auth', 
                  'active', 
                  'userType:Developer,Manager,Konselor']
                ], function() {

    Route::resource('kasus', 'KasusController');

    Route::resource('kasus.supportGroup', 'CaseDetail\SupportGroupController');
    Route::resource('kasus.mensProgram', 'CaseDetail\MensProgramController');
    Route::resource('kasus.shelter', 'CaseDetail\ShelterController');
    Route::resource('kasus.litigasiPidana', 'CaseDetail\LitigasiPidanaController');
    Route::resource('kasus.litigasiPerdata', 'CaseDetail\LitigasiPerdataController');
    Route::resource('kasus.konsHukum', 'CaseDetail\KonsHukumController');
    Route::resource('kasus.konsPsikologi', 'CaseDetail\KonsPsikologiController');
    Route::resource('kasus.layananDiberikan', 'CaseDetail\LayananDiberikanController');
    Route::resource('kasus.litigasi', 'CaseDetail\LitigasiController');

    Route::resource('kasus.arsip', 'CaseDetail\ArsipController');
    Route::resource('kasus.bentukKekerasan', 'CaseDetail\BentukKekerasanController');
    Route::resource('kasus.dampak', 'CaseDetail\DampakController');
    Route::resource('kasus.faktorPemicu', 'CaseDetail\FaktorPemicuController');
    Route::resource('kasus.homevisit', 'CaseDetail\HomevisitController');
    Route::resource('kasus.layananDibutuhkan', 'CaseDetail\LayananDibutuhkanController');
    Route::resource('kasus.mediasi', 'CaseDetail\MediasiController');
    Route::resource('kasus.medis', 'CaseDetail\MedisController');
    Route::resource('kasus.perkembangan', 'CaseDetail\PerkembanganController');
    Route::resource('kasus.symptom', 'CaseDetail\SymptomController');
    Route::resource('kasus.upayaDilakukan', 'CaseDetail\UpayaDilakukanController');
    Route::resource('kasus.rujukan', 'CaseDetail\RujukanController');

    require_once('delete-resource.php');
 
  });
