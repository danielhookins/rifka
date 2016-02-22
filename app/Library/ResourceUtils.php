<?php namespace rifka\Library;

use rifka\Library\InputUtils;
 
class ResourceUtils {
	
	/*
	|--------------------------------------------------------------------------
	| Resource Utilities Library
	|--------------------------------------------------------------------------
	|
	| A Library of Utilities for Resource-Specific Tasks.
	|
	*/
	
	/**
	 * Persist a new specific resource from user inputs.
	 *
	 * @param integer $kasus_id
   * @param string $resourceType
   * @param Array $input
   * @param Array $fields
	 * @return Response
	 */
	public static function storeResource($kasus_id, $resourceType, $input, $fields)
	{ 
		// Check input entered
		if(!InputUtils::hasFieldsEntered($fields, $input))
			return redirect()->route('kasus.show', [$kasus_id, $inLink]);

		// Store newly created resource
		$resource = ResourceUtils::createResourceArray($kasus_id, $input, $fields);
		$resourceRef = 'rifka\\'.ucfirst($resourceType);
		$stored = $resourceRef::create($resource);
		
		return redirect()
			->route('kasus.show', [$kasus_id, ResourceUtils::getInLink($resourceType)]);
	}

	/**
	 * Update a new specific resource from user inputs.
	 *
   * @param string $resource
   * @param Array $fields
   * @param Array $input
	 * @return Boolean
	 */
	public static function updateResource($resource, $fields, $input)
	{
		$input = InputUtils::nullifyDefaults($input);

		foreach ($fields as $field) {
			$resource->$field = $input[$field];
		}

		return $resource->save();
	}

	public static function getLayananDiberikan()
	{
		return array(
			'KonsPsikologi',
			'KonsHukum',
			'Homevisit',
			'Medis',
			'Shelter',
			'SupportGroup',
			'Mediasi',
			'MensProgram',
			'Rujukan');
	}

	public static function getInLink($resourceType)
	{
		if(in_array($resourceType, ResourceUtils::getLayananDiberikan()))
			return "#layanan-diberikan";

		return "#".strtolower($resourceType);
	}

	/**
	 *	Return an array for a new resource with specified input.
	 */
	public static function createResourceArray($kasus_id, $input, $fields)
	{
		$input = InputUtils::cleanInput($input);
		$input = InputUtils::nullifyDefaults($input);
		
		$resourceArray = array('kasus_id' => $kasus_id);
		foreach ($fields as $field) {
			$resourceArray[$field] = $input[$field];
		}
		return $resourceArray;
	}

}
