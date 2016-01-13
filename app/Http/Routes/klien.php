<?php 

// Client related routes
	
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