<?php namespace rifka\Http\Controllers;

use rifka\Http\Controllers\CaseDetailController;
use rifka\Arsip;

class ArsipController extends CaseDetailController {

	// Find by Id
	public function findById($id)
	{
		return Arsip::findOrFail($id);
	}

	// Get the type
	public function getType()
	{
		return "Arsip";
	}

	// Get an array of the editable fields
	public function getFields()
	{
		return ["no_reg", "media", "lokasi"];
	}
	
	// Return search results for this type
	public function search()
	{
		$query = \Input::get('searchQuery');
		$results = \rifka\Arsip::search($query)->get();
        
    	return view('arsip.searchResults', array(
				'query'		=> $query,
				'results'	=> $results));
	}

}
