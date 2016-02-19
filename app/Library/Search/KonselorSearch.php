<?php namespace rifka\Library\Search;

use DB;

class KonselorSearch {
	
	/*
	|--------------------------------------------------------------------------
	| Counsellor (Konselor) Search Utilities Library
	|--------------------------------------------------------------------------
	|
	| A Library of counsellor-search related functions.
	|
	*/

	/**
	 * Get the results for a counsellor search.
	 *
	 * @return Array
	 */	
	public static function getResults($input)
	{
		return KonselorSearch::buildQuery($input)->get();
	}

	/**
	 * Build the query of the counsellor search.
	 *
	 * @return Illuminate\Database\Query\Builder
	 */
	private static function buildQuery($input)
	{
		$query = DB::table('konselor');
		$select = array('konselor_id','nama_konselor');

		if(isset($input["nama_konselor"]) && $input["nama_konselor"] != null)
			$query->where('nama_konselor', 'LIKE', '%'.$input["nama_konselor"].'%');
		return $query->select($select);
	}

}
