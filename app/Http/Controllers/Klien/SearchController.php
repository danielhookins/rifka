<?php namespace rifka\Http\Controllers\Klien;

use rifka\Http\Controllers\KlienController;
use rifka\Klien;
use Illuminate\Http\Request;

class SearchController extends KlienController {	

	public function searchKlien(Request $request)
	{
		$query = \Input::get('searchQuery');

		// Gender Search Constraint
		if($kelamin = \Input::get('kelamin')){
			$results = Klien::where('kelamin', $kelamin)
				->orderBy('relevance', 'DESC')
				->search($query)
				->get();
		}
		else {
			$results = Klien::search($query)->get();
		}

		// Check if Search Request came from New Case Page
		$previous = $request->session()->get('_previous');
		$routeCondition = route('kasus.create');
		
		if ($previous["url"] == $routeCondition)
		{
			$request->session()->flash('query', $query);
			$request->session()->flash('results', $results);
			
			$type = \Input::get('type');

			if ($type == "Korban") 
			{
				$request->session()->flash('korbanSearch', True);
			}
			elseif ($type == "Pelaku")
			{
				$request->session()->flash('pelakuSearch', True);
				return redirect()->route('kasus.create', '#pelaku-panel');
			}
			
			return redirect()->route('kasus.create');
		}

		// Search Request came from Other Page
    	return view('klien.searchResults', array(
			'query'		=> $query,
			'results'	=> $results));
	}

}