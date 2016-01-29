<?php namespace rifka\Library;

use DB;
use rifka\Kasus;
use rifka\KlienKasus;
use rifka\Library\InputUtils;
use rifka\Library\ETLUtils;

 
/**
 *	A Library of Utilities for Case-Specific Tasks.
 */
class KasusUtils
{
	
	/**
	 *	Create a new case with user input data.
	 *
	 *	@param array $input - The user input date
	 *	@return Kasus $kasus or Exception $e 
	 */
	public static function createNewCase($input)
	{
		// Ensure defaults not saved
		$input = InputUtils::nullifyDefaults($input);

		// Create the new case record in the database
		try {
			$kasus = Kasus::create([
				'jenis_kasus' 		=> $input["jenis_kasus"],
				'hubungan' 				=> $input["hubungan"],
				'lama_hubungan' 	=> $input['lama_hubungan'],
				'jenis_lama_hub'  => $input['jenis_lama_hub'],
				'created_at'			=> $input['created_at']
				]);
			
			return $kasus;

		} catch (Exception $e) {
			
			return $e;
		
		}

	} // </createNewCase>


	/**
	 *	Create new client-case(s)
	 *	from Session data.
	 *
	 *	@param Request $request
	 *	@param int $kasus_id
	 */
	public static function createClientCaseFromSession($request, $kasus_id)
	{
		try {

			// Create a new client case record for 
			// victims added to session data
			if($korban2 = $request->session()->pull('korban2'))
			{
				foreach($korban2 as $korban)
				{
					$klienKasus = KlienKasus::create([
						'klien_id' 		=> $korban->klien_id,
						'kasus_id' 		=> $kasus_id,
						'jenis_klien' 	=> 'Korban']);

					// Add Victim to the Korban Kasus Data Warehouse
					// TODO: create a listener to do this automatically
					ETLUtils::addVictim($korban->klien_id);

				}
			}

			// Create a new client case record for 
			// perps added to session data
			if($pelaku2 = $request->session()->pull('pelaku2'))
			{
				foreach($pelaku2 as $pelaku)
				{
					$klienKasus = KlienKasus::create([
						'klien_id' 		=> $pelaku->klien_id,
						'kasus_id' 		=> $kasus_id,
						'jenis_klien' => 'Pelaku']);
				}

			}

			return true;

		} catch (Exception $e) {

			return $e;

		}

	} // </createClientCaseFromSession>


	/**
	 *	Update the specified case from user input.
	 */
	public static function updateCase($kasus_id, $input)
	{

		$kasus = Kasus::findOrFail($kasus_id);

		// Ensure defaults are not saved.
		$input = InputUtils::nullifyDefaults($input);

		// Get list of case attributes
		$kasusAttributes = array_keys($kasus->getAttributes());
		
		// Get list of inputted attributes (excluding method and input)
		unset($input["_method"]);
		unset($input["_token"]);
		$inputAttributes = array_keys($input);
		
		// Get the intersection of case attributes and inputted attributes
		$attributes = array_intersect($kasusAttributes, $inputAttributes);

		// Update the intersecting attributes
		try {
			
			foreach ($attributes as $attribute)
			{
				if($kasus->$attribute != $input[$attribute])
				{
					$kasus->$attribute = $input[$attribute];
					$kasus->save();
				}
			}

			return true;

		} catch (Exception $e) {
			return $e;
		}

	}

	 /**
   *  Get cases based on specific parameters
   *	Note: Performance will suffer if using this for multiple queries
   *
   *  @param $year      - Year of cases (default: current year)
   *  @param $month     - Month of cases
   *  @param $type      - Type of cases
   *  @param $age       - The age group of the victim
   *  @param $kabupaten - The kabupaten of the victim
   *
   *  @return Cases as query builder
   */
  public static function getCases(
    $year = null, 
    $month = null, 
    $type = null, 
    $age = null, 
    $kabupaten = null)
  {
    // Define cases variable
    $cases = DB::table('kasus');
    
    // Year is this year by default
    $year = ($year == null) ? Carbon::today()->format('Y') : $year;

    // Cases for the specified year
    $cases->where(DB::raw('YEAR(kasus.created_at)'), '=', $year);

    // Cases for the specified month
    if ($month != null)
    {
        $cases->where(DB::raw('MONTH(kasus.created_at)'), '=', $month);
    }

    // Cases for the specified type
    if ($type != null)
    {
        $cases->where('jenis_kasus', $type);
    }

    // Cases for the specified age
    if ($age != null) 
    {
        // Join the client table using the pivot table
        $cases->join('klien_kasus', 'kasus.kasus_id', '=', 'klien_kasus.kasus_id');
        $cases->join('klien', 'klien_kasus.klien_id', '=', 'klien.klien_id');
        
        // Only get victims
        $cases->where('klien_kasus.jenis_klien', 'Korban');

        // Get adults
        if ($age == "Dewasa")
        {
            $cases->where(DB::raw("YEAR(kasus.created_at) - YEAR(klien.tanggal_lahir) - (DATE_FORMAT(kasus.created_at, '%m%d') < DATE_FORMAT(klien.tanggal_lahir, '%m%d'))"), '>=', 18);
        }
        // Get teenagers 16-17
        if ($age == "Remaja16sd17")
        {
            $cases->whereBetween(DB::raw("YEAR(kasus.created_at) - YEAR(klien.tanggal_lahir) - (DATE_FORMAT(kasus.created_at, '%m%d') < DATE_FORMAT(klien.tanggal_lahir, '%m%d'))"), [16, 17]);
        }
        // Get teenagers 12-15
        if ($age == "Remaja12sd15")
        {
            $cases->whereBetween(DB::raw("YEAR(kasus.created_at) - YEAR(klien.tanggal_lahir) - (DATE_FORMAT(kasus.created_at, '%m%d') < DATE_FORMAT(klien.tanggal_lahir, '%m%d'))"), [12, 15]);
        }
        // Get children 
        if ($age == "AnakKecil")
        {
            $cases->where(DB::raw("YEAR(kasus.created_at) - YEAR(klien.tanggal_lahir) - (DATE_FORMAT(kasus.created_at, '%m%d') < DATE_FORMAT(klien.tanggal_lahir, '%m%d'))"), '<', 12);
        }

    }
    
    if ($kabupaten != null)
    {
        // Ensure client table joined
        if ($age == null)
        {
            // Join the client table using the pivot table
            $cases->join('klien_kasus', 'kasus.kasus_id', '=', 'klien_kasus.kasus_id');
            $cases->join('klien', 'klien_kasus.klien_id', '=', 'klien.klien_id');
            
            // Only get victims
            $cases->where('klien_kasus.jenis_klien', 'Korban');
        }

        // Join the address table using the pivot table
        $cases->join('alamat_klien', 'klien.klien_id', '=', 'alamat_klien.klien_id');
        $cases->join('alamat', 'alamat_klien.alamat_id', '=', 'alamat.alamat_id');

        if ($kabupaten != "Semua")
      	{
      		$cases->where('alamat.kabupaten', $kabupaten);
      	}

    }

    return $cases;
  }

}