<?php namespace rifka\Http\Controllers\Search;

use rifka\Klien;
use rifka\Http\Controllers\Controller;
use rifka\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;

class SearchController extends Controller {	

	public function index() 
	{
		return view('search.'.$this->getType());
	}

	public function searchKlien(Request $request)
	{
		$this->validate($request, ['searchQuery' => 'required|max:255']);

		$query = \Input::get('searchQuery');

		// Gender Search Constraint
		if($kelamin = \Input::get('kelamin')){
			$results = Klien::where('kelamin', $kelamin)
				->orderBy('relevance', 'DESC')
				->search($query)
				->get();
		}
		else {
			$results = Klien::search($query)->orderBy('relevance', 'DESC')->get();
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

		// Search for Adding Client to an existing case
		if(isset($request["type"]) && $request["type"] == "Klien") 
		{
			$request->session()->flash('query', $query);
			$request->session()->flash('results', $results);
			$request->session()->flash('klienSearch', True);
			return redirect()->back();
		}

		// Regular Search of Database
    	return view('klien.searchResults', array(
			'query'		=> $query,
			'results'	=> $results));
	}

	public function searchKonselor(Request $request)
	{
		$this->validate($request, [
			'search_query' => 'required|max:255'
		]);

		if($query = \Input::get('search_query'))
		{
			if($results = \rifka\Konselor::search($query)->get())
			{
				$previous = $request->session()->get('_previous');

				if($previous["url"] != route('konselor.index'))
				{
					$request->session()->flash('query', $query);
					$request->session()->flash('results', $results);
					$request->session()->flash('searchKonselor', True);

					return Redirect::to(URL::previous() . "#konselor");
				}

				return view('konselor.search')
					->with('results', $results);
			}
			else
			{
				return redirect()->back()
					->with('errors', ['Could not retrieve search results.']);
			}

		}
		else
		{
			return redirect()->back()
				->with('errors', ['Missing search query.']);
		}
	}

}