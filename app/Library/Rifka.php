<?php 
namespace rifka\Library;

use rifka\Klien;
use rifka\Kasus;
 
/**
 *	A Library of Utilities for Rifka specific tasks.
 */
class Rifka
{
	
	/**
	 * Get a multi-dimensional array of case information.
	 *
	 * @param int $kasus_id - The ID of the case.
	 * @return array $caseArray - A multi-dimensional array of case information.
	 */
	public static function getCaseArrays($kasus_id)
	{
		
		// Set case-related variables
 		$kasus = Kasus::findOrFail($kasus_id);
 		
 		$caseArray["kasus"] = $kasus->toArray();
 		$caseArray["klienKasus"] = $kasus->klienKasus()->get()->toArray();
 		$caseArray["konselorKasus"] = $kasus->konselorKasus()->get()->toArray();
 		$caseArray["perkembangan"] = $kasus->perkembangan()->get()->toArray();
 		$caseArray["arsip"] = $kasus->arsip()->get()->toArray();
 		$caseArray["bentuk"] = $kasus->bentuk()->get()->toArray();
 		$caseArray["faktorPemicu"] = $kasus->faktorPemicu()->get()->toArray();
 		$caseArray["layananDibutuhkan"] = $kasus->layananDibutuhkan()->get()->toArray();
 		$caseArray["upayaDilakukan"] = $kasus->upayaDilakukan()->get()->toArray();
 		$caseArray["dampak"] = $kasus->dampak()->get()->toArray();
 		$caseArray["kasusPentutup"] = $kasus->kasusPentutup()->get()->toArray();
 		$caseArray["litigasi"] = $kasus->litigasi()->get()->toArray();
 		$caseArray["konsPsikologi"] = $kasus->konsPsikologi()->get()->toArray();
 		$caseArray["konsHukum"] = $kasus->konsHukum()->get()->toArray();
 		$caseArray["homevisit"] = $kasus->homevisit()->get()->toArray();
 		$caseArray["supportGroup"] = $kasus->supportGroup()->get()->toArray();
 		$caseArray["mensProgram"] = $kasus->mensProgram()->get()->toArray();
 		$caseArray["rujukan"] = $kasus->rujukan()->get()->toArray();
 		$caseArray["medis"] = $kasus->medis()->get()->toArray();
 		$caseArray["mediasi"] = $kasus->mediasi()->get()->toArray();
 		$caseArray["shelter"] = $kasus->shelter()->get()->toArray();

 		return $caseArray;

	}
}