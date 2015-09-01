<?php 
namespace rifka\Library;

use rifka\Klien;
use rifka\Alamat;
use rifka\Kasus;
use Excel;
 
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

  	  $excel->sheet('Klien Kasus', function($sheet) use($cases) 
  	  {
  	    
  	    // Iterate through each case
  	    foreach($cases as $case)
  	    {
	  	    
	  	    // Clean up array and remove pivot dimension
	  	    $case = array_filter($case);
	  	    unset($case['pivot']);

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

}