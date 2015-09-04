<?php 
namespace rifka\Library;

use rifka\Kasus;
use rifka\KlienKasus;
 
/**
 *	A Library of Utilities for Case-Specific Tasks.
 */
class KasusUtils
{
	
	/**
	 *	Create a new case with user input data.
	 *
	 *	@param array $input - The user input date
	 *	@return Kasus $kasus or Exception $e 
	 */
	public static function createNewCase($input)
	{
		// Ensure defaults not saved
		$jenis_kasus = ($input["jenis_kasus"] == "Jenis")
			? null : $input["jenis_kasus"];
		$sejak_kapan = ($input["sejak_kapan"] == "")
			? null : $input["sejak_kapan"];

		// Create the new case record in the database
		try {
			$kasus = Kasus::create([
				'jenis_kasus' 		=> $jenis_kasus,
				'hubungan' 				=> $input["hubungan"],
				'lama_hubungan' 	=> $input['lama_hubungan'],
				'jenis_lama_hub'  => $input['jenis_lama_hub'],
				'sejak_kapan' 		=> $sejak_kapan,
				'seberapa_sering' => $input['seberapa_sering'],
				'harapan_korban' 	=> $input['harapan_korban'],
				'rencana_korban' 	=> $input['rencana_korban'],
				'narasi' 					=> $input['narasi']
				]);
			
			return $kasus;

		} catch (Exception $e) {
			
			return $e;
		
		}

	}

	/**
	 *	Create new client-case(s)
	 *	from Session data.
	 *
	 *	@param Request $request
	 *	@param int $kasus_id
	 */
	public static function createClientCaseFromSession($request, $kasus_id)
	{
		try {

			// Create a new client case record for 
			// victims added to session data
			if($korban2 = $request->session()->pull('korban2'))
			{
				foreach($korban2 as $korban)
				{
					$klienKasus = KlienKasus::create([
						'klien_id' 		=> $korban->klien_id,
						'kasus_id' 		=> $kasus_id,
						'jenis_klien' 	=> 'Korban']);
				}
			}

			// Create a new client case record for 
			// perps added to session data
			if($pelaku2 = $request->session()->pull('pelaku2'))
			{
				foreach($pelaku2 as $pelaku)
				{
					$klienKasus = KlienKasus::create([
						'klien_id' 		=> $pelaku->klien_id,
						'kasus_id' 		=> $kasus_id,
						'jenis_klien' => 'Pelaku']);
				}

			}

			return true;

		} catch (Exception $e) {

			return $e;

		}

	} // </createClientCase

}