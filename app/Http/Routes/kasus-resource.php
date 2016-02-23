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

    Route::resource('kasus.layananDiberikan', 'LayananDiberikanController');
    Route::resource('kasus.konsPsikologi', 'KonsPsikologiController');
    Route::resource('kasus.konsHukum', 'KonsHukumController');
    Route::resource('kasus.supportGroup', 'SupportGroupController');
    Route::resource('kasus.mensProgram', 'MensProgramController');
    Route::resource('kasus.rujukan', 'RujukanController');
    Route::resource('kasus.medis', 'MedisController');
    Route::resource('kasus.mediasi', 'MediasiController');
    Route::resource('kasus.shelter', 'ShelterController');
    Route::resource('kasus.litigasi', 'LitigasiController');
    Route::resource('kasus.litigasiPidana', 'LitigasiPidanaController');
    Route::resource('kasus.litigasiPerdata', 'LitigasiPerdataController');

    Route::resource('kasus.arsip', 'CaseDetail\ArsipController');
    Route::resource('kasus.bentukKekerasan', 'CaseDetail\BentukKekerasanController');
    Route::resource('kasus.dampak', 'CaseDetail\DampakController');
    Route::resource('kasus.faktorPemicu', 'CaseDetail\FaktorPemicuController');
    Route::resource('kasus.homevisit', 'CaseDetail\HomevisitController');
    Route::resource('kasus.layananDibutuhkan', 'CaseDetail\LayananDibutuhkanController');
    Route::resource('kasus.perkembangan', 'CaseDetail\PerkembanganController');
    Route::resource('kasus.symptom', 'CaseDetail\SymptomController');
    Route::resource('kasus.upayaDilakukan', 'CaseDetail\UpayaDilakukanController');

    require_once('delete-resource.php');
 
  });
