<?php
/**
 *  APPLICATION ROUTES
 *  This file defines all of the routes used in the application.
 *
 */


  /**
   *  Show the site root.
   *   - Unauthenticated users will be directed using the Welcome Controller.
   *   - Authenticated users will be forwarded on to their home page. 
   */
	Route::get('/', [
		'as' => 'root', 
		'uses' => 'WelcomeController@index']);


/*** RESOURCES *****************************************************/
	
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
	Route::resource('kasus.litigasi.kegiatan', 'KegiatanLitigasiController');

	Route::resource('klien', 'KlienController');
	Route::resource('klien.alamat', 'AlamatController');
	
	Route::resource('konselor', 'KonselorController');

	Route::resource('user', 'UserController');

	/*** DELETES ****************************************************/

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
	// Delete counselors
	Route::post('deleteKonselor2', [
		'as' => 'konselor2.delete',
		'uses' => 'KonselorController@deleteKonselor2']);
	// Delete client symptoms
	Route::post('kasus/{kasus_id}/removesymptom2', [
		'as' => 'symptom2.delete',
		'uses' => 'SymptomController@deleteSymptom2']);



/*** SEARCH ******************************************************/
	
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

/*** KASUS ****************************************************/
	
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

	
/*** EXPORT TO EXCEL ******************************************/

	/**
	 *	Export case information to an Excel file.
	 *
	 *	@param int kasus_id - The ID of the case 
	 */
	Route::get('kasus/{kasus_id}/exportXLS', [
		'as' => 'kasus.xls',
		'uses' => 'KasusController@exportXLS']);

	/**
	 * Export cases by age data to Excel
	 */
	Route::post('laporan/kasusOlehUsia/exportXLS', [
		'as' => 'kasusOlehUsia.xls',
		'uses' => 'LaporanController@exporLaporanUsiaXLS']);

	/**
	 * Export cases by type data to Excel
	 */
	Route::post('laporan/kasusOlehJenis/exportXLS', [
		'as' => 'kasusOlehJenis.xls',
		'uses' => 'LaporanController@exporLaporanJenisXLS']);


	/*** KLIEN ***************************************************/
	
	/**
	 *  Edit a specific section of client information.
	 *
	 *  @param int klien_id
	 *  @param string section The section of client data to edit (eg. 'kontak')
	 */ 
	Route::get('klien/{klien_id}/edit/{section}', [
		'as' => 'klien.edit',
		'uses' => 'KlienController@edit']);

	/**
	 *  Update a specific section of client information.
	 *
	 *  @param int klien_id
	 *  @param string section The section of client data to update (eg. 'kontak')
	 */ 
	Route::put('klien/{klien_id}/update/{section}', [
		'as' => 'klien.updateSection',
		'uses' => 'KlienController@update']);

	/**
	 *  Display the change log page for the specific client.
	 *
	 *  @param int klien_id
	 */
	Route::get('klien/{klien_id}/changes', [
		'as' => 'klien.changes',
		'uses' => 'ChangeLogController@showClientChanges']);

	/**
	 *  Show the Delete confirmation dialog.
	 *  
	 *  @param int klien_id
	 */
	// Show the delete client dialog
	Route::get('klien/{klien_id}/delete', [
		'as' => 'klien.delete',
		'uses' => "KlienController@confirmDestroy"]);

	/**
	 *	Export a client's personal information to an Excel file.
	 *
	 *	@param int klien_id - The ID of the client 
	 */
	Route::get('klien/{klien_id}/exportXLS', [
		'as' => 'klien.xls',
		'uses' => 'KlienController@exportXLS']);

	/*** USER ********************************************************/
	
	/**
	 *  Laravel 5 built-in authorization controllers.
	 */
	Route::controllers([
		'auth' => 'Auth\AuthController',
		'password' => 'Auth\PasswordController']);

	/**
	 *  Specific named route to log the current user out.
	 *
	 *  @return Redirect to root.
	 */
	Route::get('logout', [
		'as' => 'logout', 
		function() 
		{
			Auth::logout();
			return redirect('/');
		}]);

	/**
	 *  Show the user-specific home page.
	 */
	Route::get('home', [
		'as' => 'home', 
		'uses' => 'HomeController@index']);

	/**
	 *	Show the user change-password page
	 */
	Route::get('user/{user_id}/changePassword', [
		'as' => 'user.changePassword',
		'uses' => 'UserController@changePassword',
		'middleware' => ['userType:Manager']]);

	/**
	 *  Show the user management page
	 *  where authorised users can manage user accounts
	 */
	Route::get('manage/users', [
		'as' => 'user.management',
		'uses' => 'UserController@showUserManagement']);

	Route::get('user/{user_id}/delete',[
		'as' => 'user.deleteConfirm',
		'uses' => 'UserController@deleteConfirm']);

	Route::post('user/deleteUser',[
		'as' => 'user.deleteUser',
		'uses' => 'UserController@deleteUser',
		'middleware' => ['userType:Manager']]);


	/*** LAPORAN ********************************************************/

	/**
	 * Display the index of reports.
	 */
	Route::get('/laporan', [
		'as' => 'laporan.index', 
		'uses' => 'LaporanController@index']);

	/**
	 * Report: [GET] Number of cases by type.
	 */
	Route::get('/laporan/kasusOlehJenis', [
		'as' => 'laporan.jenis-kasus', 
		'uses' => 'LaporanController@kasusOlehJenis']);

	/**
	 * Report: [POST] Update number of cases by type.
	 */
	Route::post('/laporan/kasusOlehJenis', [
		'as' => 'laporan.jenis-kasus.update', 
		'uses' => 'LaporanController@updateKasusOlehJenis']);

	/**
	 * List: [GET] Cases by year
	 */
	Route::get('/laporan/listKasusOlehTahun', [
		'as' => 'laporan.tahun.list',
		'uses' => 'LaporanController@listKasusOlehTahun']);

	/**
	 * List: [POST] Update cases by year
	 */
	Route::post('/laporan/listKasusOlehTahun', [
		'as' => 'laporan.tahun.list.update',
		'uses' => 'LaporanController@updateListKasusOlehTahun']);

	/**
	 * List: [GET] Cases by case-type
	 */
	Route::get('/laporan/listKasusOlehJenis', [
		'as' => 'laporan.jenis.list',
		'uses' => 'LaporanController@listKasusOlehJenis']);

	/**
	 * List: [POST] Update cases by case-type
	 */
	Route::post('/laporan/listKasusOlehJenis', [
		'as' => 'laporan.jenis.list.update',
		'uses' => 'LaporanController@updateListKasusOlehJenis']);

	/**
	 * List: [GET] Cases by age
	 */
	Route::get('/laporan/listKlienOlehUsia', [
		'as' => 'laporan.usia.list',
		'uses' => 'LaporanController@listKlienOlehUsia']);

	/**
	 * List: [POST] Update cases by age
	 */
	Route::post('/laporan/listKasusOlehUsia', [
		'as' => 'laporan.usia.list.update',
		'uses' => 'LaporanController@updateListKlienOlehUsia']);

	/**
	 * Report: [GET] Kabupaten report
	 */
	Route::get('/laporan/kabupaten', [
		'as' => 'laporan.kabupaten',
		'uses' => 'LaporanController@kabupaten']);

	/**
	 * Report: [POST] Update Kabupaten report
	 */
	Route::post('/laporan/kabupaten', [
		'as' => 'laporan.kabupaten.update',
		'uses' => 'LaporanController@updateKabupaten']);

	/**
	 * Report: [GET] Cases by month report
	 */
	Route::get('/laporan/kasusPerBulan', [
		'as' => 'laporan.kasusPerBulan',
		'uses' => 'LaporanController@kasusPerBulan']);

	/**
	 * Report: [POST] Update Cases by month report
	 */
	Route::post('/laporan/kasusPerBulan', [
		'as' => 'laporan.kasusPerBulan.update',
		'uses' => 'LaporanController@updateKasusPerBulan']);

	/**
	 * Report: [GET] Usia report
	 */
	Route::get('/laporan/usia', [
		'as' => 'laporan.usia',
		'uses' => 'LaporanController@kasusOlehUsia']);

	/**
	 * Report: [POST] Update Usia report
	 */
	Route::post('/laporan/usia', [
		'as' => 'laporan.usia.update',
		'uses' => 'LaporanController@updateKasusOlehUsia']);


	/*** DEVELOPER ******************************************************/
	
	/**
	 *  Show the data dictionary.
	 */
	Route::get('/kamus', [
		'as' => 'kamus', 
		'uses' => 'KamusController@index']);

	
	// TODO: !! Delete before delploying to production environment !!

	Route::get('/developer', [
		'as' => 'developer',
		'uses' => 'DeveloperController@index']);

	Route::get('/developer/test', [
		'as' => 'developer.test',
		'uses' => 'DeveloperController@test']);

	Route::post('/developer/test', [
			'as' => 'test.post',
			'uses' => 'DeveloperController@postTest']);
