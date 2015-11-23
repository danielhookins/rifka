<?php namespace rifka\Library;
 
/**
 *	A Library of Inteligent functions to aid user experience.
 */
class AIUtils
{
	
	/**
	 *	Get case suggestions
	 *
	 *	@param Kasus $kasus
	 *	@return array $suggestions;
	 */
	public static function getSuggestions($kasus) 
	{
		$suggestions = array();

		// If no clients are attached to the case
		// suggest that the user adds a client.
		if(empty($kasus->klienKasus->toArray())) 
		{
			$suggestion = "Kasus ini belum ada klien.  Anda mau <a href='" . route('tambah.klien', 'klien') . "#klien-kasus'>tambah klien</a> sekarang?";
			array_push($suggestions, $suggestion);
		}
		return $suggestions;
	}

}