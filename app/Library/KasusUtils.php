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
	 *	Make default inputs null:
	 *	Turn fields used as examples into null
	 *  instead of entering the examples into the DB.
	 *
	 *	@param array $input
	 *	@return array $input
	 */
	public static function nullifyDefaults($input)
	{
		if(isset($input["jenis_kasus"]))
		{
			$input["jenis_kasus"] = ($input["jenis_kasus"] == "Jenis")
				? null : $input["jenis_kasus"];
		}
		if(isset($input["sejak_kapan"]))
		{
			$input["sejak_kapan"] = ($input["sejak_kapan"] == "")
				? null : $input["sejak_kapan"];
		}

		return $input;

	}


	/**
	 *	Create a new case with user input data.
	 *
	 *	@param array $input - The user input date
	 *	@return Kasus $kasus or Exception $e 
	 */
	public static function createNewCase($input)
	{
		// Ensure defaults not saved
		$input = KasusUtils::nullifyDefaults($input);

		// Create the new case record in the database
		try {
			$kasus = Kasus::create([
				'jenis_kasus' 		=> $input["jenis_kasus"],
				'hubungan' 				=> $input["hubungan"],
				'lama_hubungan' 	=> $input['lama_hubungan'],
				'jenis_lama_hub'  => $input['jenis_lama_hub'],
				'sejak_kapan' 		=> $input["sejak_kapan"],
				'seberapa_sering' => $input['seberapa_sering'],
				'harapan_korban' 	=> $input['harapan_korban'],
				'rencana_korban' 	=> $input['rencana_korban'],
				'narasi' 					=> $input['narasi']
				]);
			
			return $kasus;

		} catch (Exception $e) {
			
			return $e;
		
		}

	} // </createNewCase>


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

	} // </createClientCaseFromSession>


	/**
	 *	Update the specified case from user input.
	 */
	public static function updateCase($kasus_id, $input)
	{

		$kasus = Kasus::findOrFail($kasus_id);

		// Ensure defaults are not saved.
		$input = KasusUtils::nullifyDefaults($input);

		// Get list of case attributes
		$kasusAttributes = array_keys($kasus->getAttributes());
		
		// Get list of inputted attributes (excluding method and input)
		unset($input["_method"]);
		unset($input["_token"]);
		$inputAttributes = array_keys($input);
		
		// Get the intersection of case attributes and inputted attributes
		$attributes = array_intersect($kasusAttributes, $inputAttributes);

		// Update the intersecting attributes
		try {
			
			foreach ($attributes as $attribute)
			{
				if($kasus->$attribute != $input[$attribute])
				{
					$kasus->$attribute = $input[$attribute];
					$kasus->save();
				}
			}

			return true;

		} catch (Exception $e) {
			return $e;
		}

	}


	/**
	 *	Get case suggestions
	 *	to assist in better user-experience.
	 *
	 *	@param Kasus $kasus
	 *	@return array $suggestions;
	 */
	public static function getSuggestions($kasus) 
	{
		$suggestions = array();

		// If no clients are attached to the case
		// suggest that the user adds a client.
		if(empty($kasus->klienKasus->toArray())) 
		{
			$suggestion = "Kasus ini belum ada klien.  Anda mau <a href='" . route('tambah.klien', 'klien') . "#klien-kasus'>tambah klien</a> sekarang?";
			array_push($suggestions, $suggestion);
		}

		return $suggestions;

	} // </getSuggestions>

}