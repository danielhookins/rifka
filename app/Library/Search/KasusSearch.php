<?php namespace rifka\Library\Search;

use DB;

class KasusSearch {
	
	/*
	|--------------------------------------------------------------------------
	| Case (Kasus) Search Utilities Library
	|--------------------------------------------------------------------------
	|
	| A Library of case-search related functions.
	|
	*/

	/**
	 * Get the results for a case search.
	 *
	 * @return Array
	 */	
	public static function getResults($input)
	{
		return KasusSearch::buildQuery($input)->get();
	}

	/**
	 * Build the query of the case search.
	 *
	 * @return Illuminate\Database\Query\Builder
	 */
	private static function buildQuery($input)
	{
		$query = DB::table('kasus');
		$select = array('kasus.kasus_id', 
										'kasus.jenis_kasus',
										DB::raw('YEAR(kasus.created_at) AS tahun'),
										'klien.klien_id',
										'klien.nama_klien',
										'klien_kasus.jenis_klien',
										'kasus.created_at');

		// Case
		if(isset($input["jenis_kasus"]) && $input["jenis_kasus"] != null) {
			$query->where('jenis_kasus', $input["jenis_kasus"]);
		}
		if(isset($input["tahun"]) && $input["tahun"] != null) {
			$query->where(DB::raw('YEAR(kasus.created_at)'), '=', $input["tahun"]);
		}

		// Arsip
		if(isset($input["no_reg"]) || isset($input["media"])) 
		{
			$query->join('arsip', 'kasus.kasus_id', '=', 'arsip.kasus_id');
			array_push($select, 'no_reg');
			array_push($select, 'media');

			if(isset($input["no_reg"]) && $input["no_reg"] != null) {
				$query->where('arsip.no_reg', $input["no_reg"]);
			}
			if(isset($input["media"]) && $input["media"] != null) {
				$query->where('arsip.media', $input["media"]);
			}
		}

		// Client
		$query->join('klien_kasus', 'kasus.kasus_id', '=', 'klien_kasus.kasus_id')
						->join('klien', 'klien_kasus.klien_id', '=', 'klien.klien_id');
		if(isset($input["jenis_klien"]) && $input["jenis_klien"] != null) {
			$query->where('jenis_klien', '=', $input["jenis_klien"]);
		}
		if(isset($input["nama_klien"]) && $input["nama_klien"] != null) {
			$query->where('nama_klien', 'LIKE', $input["nama_klien"]);
		}

		$query->select($select);

		return $query;
	}

}
