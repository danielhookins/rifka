<?php namespace rifka\Library\Search;

use DB;

class KlienSearch {
	
	/*
	|--------------------------------------------------------------------------
	| Client (Klien) Search Utilities Library
	|--------------------------------------------------------------------------
	|
	| A Library of client-search related functions.
	|
	*/

	/**
	 * Get the results for a client search.
	 *
	 * @return Array
	 */
	public static function getResults($input)
	{
		return KlienSearch::buildQuery($input)->get();
	}

	/**
	 * Build the query of the client search.
	 *
	 * @return Illuminate\Database\Query\Builder
	 */
	private static function buildQuery($input)
	{
		$query = DB::table('klien')->where('klien.deleted_at', '=', null);

		if(isset($input["klien_id"]) && $input["klien_id"] != null) {
			$query->where('klien.klien_id', $input["klien_id"]);
		}
		if(isset($input["nama_klien"]) && $input["nama_klien"] != null) {
			$query->where('nama_klien', 'LIKE', $input["nama_klien"]);
		}
		if(isset($input["kelamin"]) && $input["kelamin"] != null) {
			$query->where('kelamin', $input["kelamin"]);
		}
		if(isset($input["email"]) && $input["email"] != null) {
			$query->where('email', 'LIKE', $input["email"]);
		}
		if(isset($input["kabupaten"]) && $input["kabupaten"] != " ") {
			$query->join('alamat_klien', 'klien.klien_id', '=', 'alamat_klien.klien_id')
          	->join('alamat', 'alamat_klien.alamat_id', '=', 'alamat.alamat_id');
			$query->where('alamat.kabupaten', $input["kabupaten"]);
		}

		return $query;
	}

}
