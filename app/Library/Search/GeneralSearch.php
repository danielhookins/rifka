<?php namespace rifka\Library\Search;

use rifka\Library\Search\KlienSearch;
use rifka\Library\Search\KasusSearch;

class GeneralSearch {
	
	/*
	|--------------------------------------------------------------------------
	| General Search Utilities Library
	|--------------------------------------------------------------------------
	|
	| A Library of search-related functions.
	|
	*/

	/**
	 * Get all data required to display the specified search.
	 *
	 * @return Array
	 */
	public static function getData($input)
	{
		$input = GeneralSearch::makeSeachFuzzy($input);

		$data["results"] = GeneralSearch::searchByType($input);
		$data["view"] = GeneralSearch::getView($input);
		$data["referPage"] = GeneralSearch::getReferPage($input);
		$data["kasus_id"] = GeneralSearch::getKasusID($input);
		$data["type"] = GeneralSearch::getType($input);

		return $data;
	}

	/**
	 * Search by a specified type or general.
	 *
	 * @return Array
	 */
	private static function searchByType($input)
	{
		if ($input["searchType"] == "general")
			return GeneralSearch::getResults($input);
		elseif ($input["searchType"] == "klien")
			return KlienSearch::getResults($input);
		elseif ($input["searchType"] == "kasus")
			return KasusSearch::getResults($input);
		elseif ($input["searchType"] == "konselor")
			return KonselorSearch::getResults($input);
	}

	private static function makeSeachFuzzy($input)
	{
		if (isset($input["fuzzy"]) && $input["fuzzy"] == "fuzzy")
		{
			if (isset($input["queryInput"])) 
			{
				$input["queryInput"] = "%" . $input["queryInput"] . "%";
			}

			if (isset($input["nama_klien"]))
			{
				$input["nama_klien"] = "%" . $input["nama_klien"] . "%";
			}
			
		}

		return $input;
	}

	/**
	 * Get the approriate view resource for displaying results.
	 *
	 * @return string
	 */
	private static function getView($input)
	{
		return "search.".GeneralSearch::getSpecificType($input)."-results";
	}

	/**
	 * Get the referring page if supplied.
	 *
	 * @return string
	 */
	private static function getReferPage($input)
	{
		if(!isset($input["refer-page"]) || $input["refer-page"] == null) return null;
		return $input["refer-page"];
	}

	/**
	 * Get the specific type of search.
	 *
	 * @return string
	 */
	private static function getSpecificType($input)
	{
		if (!isset($input["searchType"]) && !isset($input["queryType"])) return null;
		if ($input["searchType"] != "general") return $input["searchType"];
		if ($input["queryType"] == "nama_klien") return "klien";
		if ($input["queryType"] == "no_reg") return "kasus";
	}

	/**
	 * Get the specified case ID (kasus_id)
	 *
	 * @return integer
	 */
	private static function getKasusID($input)
	{
		return (isset($input["kasus_id"])) ? $input["kasus_id"] : null;
	}

	/**
	 * Get the specified type.
	 *
	 * @return string
	 */
	private static function getType($input)
	{
		return (isset($input["type"])) ? $input["type"] : null;
	}

	/**
	 * Get the results for a general search.
	 *
	 * @return Array
	 */
	private static function getResults($input)
	{
		if ($input["queryType"] == "nama_klien") {
			$input["nama_klien"] = $input["queryInput"];
			return KlienSearch::getResults($input);
		} elseif ($input["queryType"] == "no_reg") {
			$input["no_reg"] = $input["queryInput"];
			return KasusSearch::getResults($input);
		}
	}

}
