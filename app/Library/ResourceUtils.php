<?php 
namespace rifka\Library;

use rifka\Library\InputUtils;
 
/**
 *	A Library of Utilities for Resource-Specific Tasks.
 */
class ResourceUtils
{
	
	/**
	 *	Return an array for a new resource with specified input.
	 */
	public static function createResourceArray($kasus_id, $input, $fields)
	{
		$input = InputUtils::cleanInput($input);
		$input = InputUtils::nullifyDefaults($input);
		
		$resourceArray = array('kasus_id' => $kasus_id);
		foreach ($fields as $field)
		{
			$resourceArray[$field] = $input[$field];
		}

		return $resourceArray;
	}


	/**
	 *	Update a specified resource with specified input.
	 */
	public static function updateResource($resource, $fields, $input)
	{
		try {
			foreach ($fields as $field)
			{
				$resource->$field = $input[$field];
			}
			$resource->save();

			// resource updated
			return true;

		} catch (Exception $e) {
			//could not update resource
			return $e;
		}	
	}


	/**
	 *	Store a new resource in the DB
	 */
	public static function storeResource($kasus_id, $resourceType, $input, $fields)
	{

		// Define array of services given (layanan-diberikan)
		$layananDiberikan = array(
			'KonsPsikologi',
			'KonsHukum',
			'Homevisit',
			'Medis',
			'Shelter',
			'SupportGroup',
			'Mediasi',
			'MensProgram',
			'Rujukan'
			);

		// set in-link name
		if(in_array($resourceType, $layananDiberikan))
		{
			$inLink = "#layanan-diberikan";
		} 
		else
		{
			$inLink = "#".strtolower($resourceType);
		}

		// check fields contain input
		$fieldsEntered =  InputUtils::fieldsEntered($fields, $input);
		if(!$fieldsEntered)
		{
			// no input from user (fields empty)
			return redirect()
				->route('kasus.show', [$kasus_id, $inLink]);

		}

		// create resource array
		$resource = ResourceUtils::createResourceArray($kasus_id, $input, $fields);

		try {
			// Stored newly created resource
			$resourceRef = 'rifka\\'.$resourceType;
			$stored = $resourceRef::create($resource);
		
		} catch (Exception $e) {
			// Could not create resource
			return $e;

		}
		return redirect()
			->route('kasus.show', [$kasus_id, $inLink]);

	}

}