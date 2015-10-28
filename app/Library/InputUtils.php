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
			"jenis" 						=> "Jenis",
			"jenis_kasus" 			=> "Jenis",
			"jenis_pemicu" 			=> "Jenis",
			"jenis_upaya" 			=> "Upaya Dilakukan",
			"jenis_layanan" 		=> "Layanan Dibutuhkan",
			"jenis_dampak"			=> "Dampak",
			"jenis_litigasi"		=> "Jenis Litigasi",
			"sejak_kapan" 			=> "",
			"tanggal" 					=> "",
			"mulai_tanggal" 		=> "",
			"sampai_tanggal"		=> "",
			"tanggal_lahir"			=> "",
			"media"							=> "Media",
			"no_reg"						=> "",
			"agama"							=> "Agama",
			"status_perkawinan" => "Status Perkawinan",
			"pendidikan"				=> "Pendidikan",
			"penghasilan"				=> "Penghasilan"
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


	/**
	 * Get the new year from user input
	 * @return int $year
	 */
	public static function getUpdatedYear($input)
  {
    $year = $input['year'];
        
    if(isset($input['change']))
    {
        if($input['change'] == "prev")
        {
            $year = $year - 1;
        }
        elseif($input['change'] == "next")
        {
            $year = $year + 1;
        }
    }
    return $year;
  }


  public function getYearsArrayFromInput($input)
  {
  	$years = array();

    if($input["mulai"] == "" && $input["sampai"] == "")
    {
      // no input given
      return; // TODO: redirect to error page
    } else if ($input["mulai"] == "" || $input["sampai"] == "") {
        $years[] = ($input["mulai"] != "") 
            ? $input["mulai"] : $input["sampai"];
    } else {
        for ($i = (int)$input["mulai"]; $i <= (int)$input["sampai"]; $i++)
        {
          $years[] = $i;
        }
    }
    return $years;
  }


  public static function toSelectArray($options) {
  	$selectArray = array();

  	foreach ($options as $option)
  	{
  		$selectArray[$option] = $option;
  	}

  	return $selectArray;
  }

}