<?php 
namespace rifka\Library;

use Auth;
use rifka\Klien;
use rifka\Alamat;
use rifka\Kasus;
use Excel;
use rifka\Library\Rifka;
 
/**
 *	A Library of Utilities for working with Excel files.
 */
class ExcelUtils{

   /**
    *	Export a client's information to an Excel file.
    * 
    * @param int $klien_id - The ID number of the client.
    * @return An Excel document containing client information.
    */
   public static function exportClientInfoXLS($klien_id)
   {

   	// Set Client personal and address information
    $client = Klien::
    	where('klien_id', $klien_id)->first()->toArray();
    $addresses = Alamat::
    	where('klien_id', $klien_id)->get()->toArray();
		
		// Set Client Case information
		$activeClient = Klien::find($klien_id);
		$cases = $activeClient->klienKasus()->get()->toArray();

   	// Remove empty values
    $client = array_filter($client);
    $addresses = array_filter($addresses);

 		return Excel::create('Klien_'.$client["klien_id"], function($excel) use($client, $cases, $addresses) 
 		{

		  if(!empty($addresses)) // If client has at least one address
		  {
		  	// create the client address sheet
		  	$excel->sheet('Alamat Klien', function($sheet) use($addresses) 
			  {
			  	  // Set keys as column titles
			  	  $sheet->appendRow(array_keys($addresses[0])); // column names

			  	  // Make titles bold
			  	  $sheet->row($sheet->getHighestRow(), function ($row) 
			  	  {
			  	      $row->setFontWeight('bold');
			  	  });

			  	  // Append address details to next row
			  	  foreach ($addresses as $address) 
			  	  {
			  	    $sheet->appendRow($address);
			  		}

			  });
		  }
		  
		  // Client Case information is restricted to the following:
		  $allowedAccess = array("Manager", "Konselor", "Developer");
		  
		  if(!empty($cases) 				// ensure at least one case exists
		  	&& (in_array(
		  		Auth::user()->jenis, 
		  		$allowedAccess))) 		// ensure user has permission to access case data. 
		  {
	  	  // Create the client case sheet
	  	  $excel->sheet('Klien Kasus', function($sheet) use($cases) 
	  	  {
	  	    
	  	    // Iterate through each case
	  	    foreach($cases as $case)
	  	    {
		  	    
		  	    // Clean up array and remove pivot dimension
		  	    $case = array_filter($case);		  	    
		  	    if(isset($case['pivot']))
		  	    {
		  	    	
		  	    	if(isset($case['pivot']['jenis_klien']))
		  	    	{
		  	    		$case['jenis_klien'] = $case['pivot']['jenis_klien'];
		  	    	}
		  	    	
		  	    	unset($case['pivot']);
		  	    }
		  	    

		  	    // Iterate through the keys and attributes of the case
		  	    // appending attributes vertically
		  	    foreach($case as $key => $value)
		  	    {
		  	    	$sheet->appendRow([$key, $value]);
		  	    }

		  	    // Append blank row for clearer presentation of multiple cases
			  		$sheet->appendRow([""]);
	  	    }

	  	    // Set font to bold in title column
	  	    $sheet->cells('A1:A999', function($cells) 
	  	    {
	          $cells->setFont(array('bold' => true));
	  	    });

	  		});	
		  }
  	  
		  // Create the client information sheet
		  $excel->sheet('Informasi Klien', function($sheet) use($client) 
		  {
		    
		    // Iterate through array 
		    // appending attributes vertically
		    foreach($client as $key => $value)
		    {
		    	$sheet->appendRow([$key, $value]);
		    }

		    // Set font to bold in title column
		    $sheet->cells('A1:A999', function($cells) 
		    {
	        $cells->setFont(array('bold' => true));
		    });

			});

 		})->export('xls'); // Export the created Excel file
 	
 	}

 	/**
 	 *	Export case information to an Excel file.
 	 * 
 	 * @param int $kasus_id - The ID number of the case.
 	 * @return An Excel document containing case information.
 	 */
 	public static function exportCaseInfoXLS($kasus_id)
 	{

 		$caseInfo = Rifka::getCaseArrays($kasus_id);

 		// Check if an is multi-dimensional
 		function isMulti($array){
 			if(is_array($array)){
 				foreach($array as $item) {
 					if(is_array($item)){
 						return true;
 					} else {
 						return false;
 					}
 				}
 			} else {
 				return false;
 			}
 		}

 		// Create an Excel file
 		$file = Excel::create('Kasus_'.$caseInfo["kasus"]["kasus_id"], 
 			function($excel) use($caseInfo) 
	 		{

		 		foreach ($caseInfo as $key => $value)
		 		{
		 			
		 			if($value) // Only use non null values
		 			{
	 				
		 				// Create an Excel Sheet
		 				$excel->sheet($key, function($sheet) use($value) 
			  		{
						  
			  			// TODO: Rename variables for clarity
			  			// Clean up value array
			  			$value = array_filter($value);

						  // Append value details to next row
						  if(isMulti($value))
						  {
						  	
						  	// Append array keys as column names
						  	$titles = array_keys($value[0]);
						  		// extract jenis_klien from pivot table.
						  	if(($key = array_search("pivot", $titles)) !== false)
								{
									$titles[$key] = "jenis_klien";
								}
						  	$sheet->appendRow($titles); // column names

						  	// Make titles bold
						  	$sheet->row($sheet->getHighestRow(), function ($row) 
						  	{
						  	    $row->setFontWeight('bold');
						  	});

						  	foreach($value as $data){
						  		
						  		// Move pivot dimension	to main array.    
						  		if(isset($data['pivot']))
						  		{
						  			
						  			if(isset($data['pivot']['jenis_klien']))
						  			{
						  				$data['jenis_klien'] = $data['pivot']['jenis_klien'];
						  			}
						  			
						  			unset($data['pivot']);
						  		}

						  		$sheet->appendRow($data);
						  	}

						  } else {
						  	
						  	// Set keys as column titles
						  	$sheet->appendRow(array_keys($value)); // column names

						  	// Make titles bold
						  	$sheet->row($sheet->getHighestRow(), function ($row) 
						  	{
						  	    $row->setFontWeight('bold');
						  	});

						  	// Append Value to row
						  	$sheet->appendRow($value);
						  }

			  		}); // End of Create Excel Sheet

		 			} // End of using non-null values 
		 			
		 		} // End of CaseInfo

		 	}); // End of Create Excel File

 		return $file->export('xls');;

 	}

	/**
	 *	Export rows data to Excel file
	 */
 	public static function exportRowsData($title, $headers, $data) {

 		// Create new Excel file
		$file = Excel::create($title, function($excel) use ($title, $headers, $data) {

					// Create one sheet report from data array   
					$excel->sheet($title, function($sheet) use ($title, $headers, $data) {

						$sheet->row(1, $headers);

						foreach($data as $row) {
							// Append row
							$sheet->appendRow($row);
						}

			    });

		});

		return $file->export('xls');

 	}

}