<?php 
namespace rifka\Library;

use rifka\Alamat;
use rifka\AlamatKlien;
use rifka\Kasus;
 
/**
 *	A Library of Utilities for Address-Specific Tasks.
 */
class AlamatUtils
{
	/**
	 *	Get an existing address 
	 *	based on specified alamat, kecamatan and kabupaten.
	 *
	 *	@param string $alamat
	 *	@param string $kecamatan
	 *	@param string $kabupaten
	 *	@return Alamat or null
	 */
	public static function getExisting($alamat, $kecamatan, $kabupaten)
	{
		
		$alamat = Alamat::
			where('alamat', $alamat)
			->where('kecamatan', $kecamatan)
			->where('kabupaten', $kabupaten)
			->first();

		return (!empty($alamat)) ? $alamat : null;
	}

	/**
	 *	Check if any clients are attached to a specific address.
	 */
	public static function hasClients($alamat_id)
	{
		try
		{
			$alamat = Alamat::find($alamat_id);

			if (!empty($alamatKlien = 
						AlamatKlien::where('alamat_id', $alamat_id)->get()->toArray()))
			{
				// Clients exist had the specified address
				return true;
			
			} else{
				// No clients exist at the specified address
				return false;
			}

		} catch (Exception $e) {
			// Could not determine if clients exist at address
			return $e;
		}
	}

	/**
	 *	Remove client from all associated addresses.
	 */
	public static function removeClientFromAll($klien_id)
	{
		$alamatKlien = AlamatKlien::where('klien_id', 'klien_id');

		try {
			
			dd($alamatKlien);
			return true;

		} catch (Exception $e) {

			// Could not remove client from all associated addresses
			return false;
		}

	}

	public static function getKabupaten($provinsi = "Yogyakarta") 
	{
		$kabupaten = array();

		if($provinsi == "Yogyakarta") {
			$kabupaten = array("Bantul","Gunungkidul","Kulon Progo","Sleman","Yogyakarta");
		}
		
		return $kabupaten;
	}

}