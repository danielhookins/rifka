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
	Route::resource('kasus.faktorPemicu', 'FaktorPemicuController');
	Route::resource('kasus.upayaDilakukan', 'UpayaDilakukanController');
	Route::resource('kasus.layananDibutuhkan', 'LayananDibutuhkanController');
	Route::resource('kasus.dampak', 'DampakController');
	Route::resource('kasus.arsip', 'ArsipController');
	Route::resource('kasus.litigasi', 'LitigasiController');
	Route::resource('kasus.litigasi.kegiatan', 'KegiatanLitigasiController');

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
	
	Route::resource('klien', 'KlienController');
	Route::resource('klien.alamat', 'AlamatController');
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


// * DELETE RESOURCES *

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
		'uses' => 'PerkembanganController@deletePerkembangan2']);
	// Delete trigger factors
	Route::post('kasus/{kasus_id}/removepemicu2', [
		'as' => 'pemicu2.delete',
		'uses' => 'FaktorPemicuController@deletePemicu2']);
	// Delete efforts tried (upaya dilakukan)
	Route::post('kasus/{kasus_id}/removeupaya2', [
		'as' => 'upaya2.delete',
		'uses' => 'UpayaDilakukanController@deleteUpaya2']);
	// Delete required service (layanan dibutuhkan)
	Route::post('kasus/{kasus_id}/removelayanandbth2', [
		'as' => 'layanandbth2.delete',
		'uses' => 'LayananDibutuhkanController@deleteLayananDbth2']);
	// Delete impact experienced (dampak)
	Route::post('kasus/{kasus_id}/removedampak2', [
		'as' => 'dampak2.delete',
		'uses' => 'DampakController@deleteDampak2']);
	// Delete physical record (arsip)
	Route::post('kasus/{kasus_id}/removearsip2', [
		'as' => 'arsip2.delete',
		'uses' => 'ArsipController@deleteArsip2']);
	// Delete legal activity (kegiatan litigasi)
	Route::post('kasus/{kasus_id}/litigasi/{litigasi_id}/removekegiatan2', [
		'as' => 'kegiatan2.delete',
		'uses' => 'KegiatanLitigasiController@deleteKegiatan2']);
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
		'uses' => 'AlamatController@deleteAlamat2']);

	/*** KLIEN *****************************************************************/
	
	/**
	 *  Edit a specific section of client information.
	 *
	 *  @param int klien_id
	 *  @param string section The section of client data to edit (eg. 'kontak')
	 *  @return Redirects to appropriate page with page-display information stored in session 
	 */ 
	Route::get('klien/{klien_id}/edit/{section}', [
		'as' => 'klien.edit',
		'uses' => 'KlienController@edit']);

	/**
	 *  Update a specific section of client information.
	 *
	 *  @param int klien_id
	 *  @param string section The section of client data to update (eg. 'kontak')
	 *  @return Redirects to appropriate page with page-display information stored in session 
	 */ 
	Route::put('klien/{klien_id}/update/{section}', [
		'as' => 'klien.updateSection',
		'uses' => 'KlienController@update']);

	
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
		'as' => 'developer',
		'uses' => 'DeveloperController@index']);

		Route::get('/developer/test', [
		'as' => 'developer.test',
		'uses' => 'DeveloperController@test']);

		Route::post('/developer/test', [
			'as' => 'test.post',
			'uses' => 'DeveloperController@postTest']);
