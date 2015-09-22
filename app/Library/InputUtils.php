<?php 
namespace rifka\Library;
 
/**
 *	A Library of Utilities for (User)Input-Specific Tasks.
 */
class InputUtils
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
		// Define the default inputs that will NOT be saved
		$defaults = array(
			"jenis" 				=> "Jenis",
			"jenis_kasus" 	=> "Jenis",
			"jenis_pemicu" 	=> "Jenis",
			"jenis_upaya" 	=> "Upaya Dilakukan",
			"jenis_layanan" => "Layanan Dibutuhkan",
			"jenis_dampak"	=> "Dampak",
			"sejak_kapan" 	=> "",
			"tanggal" 			=> ""
			);

		foreach ($defaults as $name => $defaultValue)
		{
			if(isset($input[$name]))
			{
				$input[$name] = ($input[$name] == $defaultValue)
					? null : $input[$name];
			}
		}
		return $input;
	}


	/**
	 *	Remove _method and _token (or specified array) from input array.
	 */
	public static function cleanInput($input, $toClean = array("_method","_token"))
	{
		foreach ($toClean as $name)
		{
			if(isset($input[$name]))
			{
				unset($input[$name]);
			}
		}
		return $input;
	}


	/**
	 *	Check if fields contain input.
	 */
	public static function fieldsEntered($fields, $input)
	{
		
		$input = InputUtils::nullifyDefaults($input);

		foreach ($fields as $field)
		{
			if($input[$field] != "" || $input[$field] != null) 
			{
				return true;
			}
		}

		// no input entered
		return false;
	}
}