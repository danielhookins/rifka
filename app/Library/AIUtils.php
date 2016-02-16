<?php namespace rifka\Library;
 
class AIUtils {
	
	/*
	|--------------------------------------------------------------------------
	| AI Library
	|--------------------------------------------------------------------------
	|
	| A Library of Inteligent functions to aid user experience.
	|
	*/

	/**
	 * Get suggestions for case input 
	 * based on currently avaialbe case data.
	 *
	 * @param Kasus $kasus
	 * @return Array
	 */
	public static function getCaseInputSuggestions($kasus) {
		$suggestions = array();

		// No clients are attached to the case
		if(empty($kasus->klienKasus->toArray())) 
			array_push($suggestions, "Kasus ini belum ada klien.  Anda mau <a href='" . route('tambah.klien', 'klien') . "#klien-kasus'>tambah klien</a> sekarang?");

		return $suggestions;
	}

}
