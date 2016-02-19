<?php namespace rifka\Library;

use rifka\Klien;
use rifka\KlienKasus;
use rifka\Library\InputUtils;
 
/**
 *	A Library of Utilities for Client-Specific Tasks.
 */
class KlienUtils
{

	//
	public static function updateKlien($klien_id, $fields, $input) 
	{
		$klien = Klien::findOrFail($klien_id);
		$input = InputUtils::nullifyDefaults($input);
		$inLink = (isset($input["submitBtn"])) 
			? "#".$input["submitBtn"] : "";

		try {
			foreach ($fields as $field)
			{
				$klien->$field = $input[$field];
			}
			$klien->save();

			// client updated return to client page
			return redirect()->route('klien.show', $klien_id.$inLink);

		} catch (Exception $e) {
			//could not update client
			return $e;
		}	

	}

}