<?php

	Route::get('ETL/initKorbanKasus', [
		'as' => 'etl.init.korbanKasus',
		'uses' => 'ETLController@initDWKorbanKasus']);
		
	Route::get('ETL/initPelakuKasus', [
		'as' => 'etl.init.pelakuKasus',
		'uses' => 'ETLController@initDWPelakuKasus']);