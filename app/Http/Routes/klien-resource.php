<?php 

	/*
	|--------------------------------------------------------------------------
	| Client (Klien) Resource Routes
	|--------------------------------------------------------------------------
	|
	| This route group applies 'auth', 'active' and 'userType' middleware.
	|
	*/

	Route::group(['middleware' => [
									'auth', 
									'active', 
									'userType:Developer,Manager,Konselor,Front Office']
								], function() {
		
		Route::resource('klien', 'KlienController');
		
		Route::resource('klien.alamat', 'Alamat\AlamatController');

});
