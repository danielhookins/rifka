<?php namespace rifka\Library;

use rifka\Alamat;
use rifka\AlamatKlien;
 
class AlamatUtils {

	/*
	|--------------------------------------------------------------------------
	| Alamat Library
	|--------------------------------------------------------------------------
	|
	| A Library of Utilities for Address-Specific Tasks.
	|
	*/

	/**
	 *	Get an existing address 
	 *	based on specified alamat, kecamatan and kabupaten.
	 *
	 *	@param string $alamat
	 *	@param string $kecamatan
	 *	@param string $kabupaten
	 *	@return Alamat or null
	 */
	public static function getExisting($alamat, $kecamatan, $kabupaten) {
		$alamat = Alamat::where('alamat', $alamat)
			->where('kecamatan', $kecamatan)
			->where('kabupaten', $kabupaten)
			->first();
		return (!empty($alamat)) ? $alamat : null;
	}

	/**
	 *	Check if any clients are attached to a specific address.
	 *
	 *	@param int $alamat_id
	 *	@return Boolean
	 */
	public static function hasClients($alamat_id) {
		return (AlamatKlien::where('alamat_id', $alamat_id)->count() > 0) 
		 ? true : false;
	}

	/**
	 *	Get an array of the recencies within a province.
	 *
	 *	@param string $provinsi
	 *	@return Array
	 */
	public static function getKabupaten($provinsi = "Yogyakarta") {
		$kabupaten = array();

		if($provinsi == "Yogyakarta")
			$kabupaten = array("Bantul","Gunungkidul","Kulon Progo","Sleman","Yogyakarta");
		
		return $kabupaten;
	}

}
