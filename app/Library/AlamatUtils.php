<?php namespace rifka\Library;

use rifka\Alamat;
use rifka\AlamatKlien;
 
class AlamatUtils {

	/*
	|--------------------------------------------------------------------------
	| Alamat Utilities Library
	|--------------------------------------------------------------------------
	|
	| A Library of Utilities for Address-Specific Tasks.
	|
	*/

	/**
	 *	Get an existing address 
	 *	based on specified alamat, kecamatan, kabupaten and provinsi.
	 *
	 *	@param Array
	 *	@return Alamat or null
	 */
	public static function getExisting($data) 
	{
		$alamat = Alamat::where('alamat', 'LIKE', $data["alamat"])
			->where('kecamatan', 'LIKE', $data["kecamatan"])
			->where('kabupaten', 'LIKE', $data["kabupaten"])
			->where('provinsi', 'LIKE', $data["provinsi"])
			->first();
		return (!empty($alamat)) ? $alamat : null;
	}

	/**
	 *	Check if supplied data exists as address
	 *
	 *	@param Array
	 *	@return Boolean
	 */
	public static function isAddress($data)
	{
		return (AlamatUtils::getExisting($data) != null) ? true : false;
	}

	/**
	 *	Check if any clients are attached to a specific address.
	 *
	 *	@param integer
	 *	@return Boolean
	 */
	public static function hasClients($alamat_id) 
	{
		return (AlamatKlien::where('alamat_id', $alamat_id)->count() > 0) 
		 ? true : false;
	}

	/**
	 *	Get an array of the recencies within a province.
	 *
	 *	@param string
	 *	@return Array
	 */
	public static function getKabupaten($provinsi = "Yogyakarta") 
	{
		$kabupaten = array();

		if($provinsi == "Yogyakarta")
			$kabupaten = array("Bantul","Gunungkidul","Kulon Progo","Sleman","Yogyakarta");
		
		return $kabupaten;
	}

	/**
	 *	Prepare an array of address variables.
	 *
	 *	@param Array
	 *	@return Array
	 */
	public static function getVariablesFromInput($input)
	{
		$data["alamat"] 		= $input['alamat'];
		$data["kecamatan"] 	= $input['kecamatan'];
		$data["kabupaten"] 	= $input['kabupaten'];
		$data["provinsi"] 	= $input['provinsi'];
		$data["jenis"] 			= ($input['jenis'] == "Jenis") ? null : $input['jenis'];

		return $data;
	}

	/**
	 *	Persist a new address if does not exist.
	 *
	 *	@param Array
	 *	@return Alamat
	 */
	public static function storeNewAddress($data)
	{
		if(AlamatUtils::isAddress($data)) {
			return AlamatUtils::getExisting($data);
		} else {
			return Alamat::create($data);
		}

	}

	/**
	 *	Add a new client to an address.
	 *
	 *	@param Array
	 *	@param integer
	 *	@return AlamatKlien
	 */
	public static function storeAlamatKlien($data, $klien_id)
	{
		$alamat = AlamatUtils::getExisting($data);
		return AlamatKlien::create([
				'klien_id' => $klien_id,
				'alamat_id' => $alamat->alamat_id,
				'jenis' => $data['jenis']
			]);
	}

	/**
	 *	Update a client's address.
	 *
	 *	@param integer
	 *	@param integer
 	 *	@param Array
	 *	@return Alamat
	 */
	public static function updateClientAddress($klien_id, $alamat_id, $data)
	{
		// Remove client from old address
		AlamatUtils::removeClientFromAddress($klien_id, $alamat_id);

		// Create/Use new address, attach client.
		$newAlamat = AlamatUtils::storeNewAddress($data);
		$newAlamat = AlamatUtils::storeAlamatKlien($data, $klien_id);

		// Clean up old address if no clients attached
		AlamatUtils::removeClientlessAddress($alamat_id);

		return $newAlamat;
	}

	/**
	 *	Remove an address if it no longer has clients.
	 *
	 *	@param integer
	 *	@return Boolean
	 */
	public static function removeClientlessAddress($alamat_id)
	{
		if(!AlamatUtils::hasClients($alamat_id))
			return Alamat::findOrFail($alamat_id)->delete();

		return false;
	}

	/**
	 * Remove a specific client from a specific address.
	 *
	 * @param integer
	 * @param integer
	 * @return void
	 */
	public static function removeClientFromAddress($klien_id, $alamat_id)
	{
		return AlamatKlien::where('alamat_id', $alamat_id)
			->where('klien_id', $klien_id)
			->delete();
	}

}
