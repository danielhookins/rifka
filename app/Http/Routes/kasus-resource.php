<?php 

	// Case related resources
	Route::resource('kasus', 'KasusController');
	Route::resource('kasus.perkembangan', 'PerkembanganController');
	Route::resource('kasus.bentukKekerasan', 'BentukKekerasanController');
	Route::resource('kasus.faktorPemicu', 'FaktorPemicuController');
	Route::resource('kasus.upayaDilakukan', 'UpayaDilakukanController');
	Route::resource('kasus.layananDibutuhkan', 'LayananDibutuhkanController');
	Route::resource('kasus.dampak', 'DampakController');
	Route::resource('kasus.arsip', 'ArsipController');
	Route::resource('kasus.layananDiberikan', 'LayananDiberikanController');
	Route::resource('kasus.konsPsikologi', 'KonsPsikologiController');
	Route::resource('kasus.konsHukum', 'KonsHukumController');
	Route::resource('kasus.homevisit', 'HomevisitController');
	Route::resource('kasus.supportGroup', 'SupportGroupController');
	Route::resource('kasus.mensProgram', 'MensProgramController');
	Route::resource('kasus.rujukan', 'RujukanController');
	Route::resource('kasus.medis', 'MedisController');
	Route::resource('kasus.mediasi', 'MediasiController');
	Route::resource('kasus.shelter', 'ShelterController');
	Route::resource('kasus.symptom', 'SymptomController');
	Route::resource('kasus.litigasi', 'LitigasiController');
	Route::resource('kasus.litigasiPidana', 'LitigasiPidanaController');
	Route::resource('kasus.litigasiPerdata', 'LitigasiPerdataController');
	//Route::resource('kasus.litigasi.kegiatan', 'KegiatanLitigasiController');