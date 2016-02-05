<?php 

// Client related resources
Route::group(['middleware' => 'userType:Developer,Manager,Konselor,Front Office'], function()
{
	Route::resource('klien', 'KlienController');
	Route::resource('klien.alamat', 'AlamatController');
});
