<?php

	Route::get('ETL/initKorbanKasus', [
		'as' => 'etl.init.korbanKasus',
		'uses' => 'ETLController@initDWKorbanKasus']);