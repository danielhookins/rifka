<?php namespace rifka\Http\Controllers\Search;

use rifka\Library\Search\GeneralSearch;
use rifka\Http\Controllers\Controller;
use rifka\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;

class SearchController extends Controller {	

	/*
	|--------------------------------------------------------------------------
	| Search Controller
	|--------------------------------------------------------------------------
	|
	| This base controller handles search functionality.
	|
	*/

	protected $request;

	/**
	 * Create a new SearchController instance.
	 *
	 * @return void
	 */
	public function __construct(Request $request)
	{
		$this->request = $request;
	}

	/**
	 * Display the Home Page.
	 *
	 * @return Response
	 */
	public function index() 
	{
		return view('home');
	}

	/**
	 * Display the advanced client search Page.
	 *
	 * @return Response
	 */
	public function searchKlien()
	{
		return view('search.klien');
	}

	/**
	 * Display the advanced case search Page.
	 *
	 * @return Response
	 */
	public function searchKasus()
	{
		return view('search.kasus');
	}

	/**
	 * Search for clients or cases
	 *
	 * @return Response
	 */
	public function search()
	{
		$data = GeneralSearch::getData(\Input::get());
		return view($data["view"])->with('data', $data);
	}

	/**
	 * Search for counselors
	 *
	 * @return Response
	 */
	public function searchKonselor(Request $request)
	{
		$this->validate($request, ['search_query' => 'required|max:255']);
		
		$query = \Input::get('search_query');
			
		if($results = \rifka\Konselor::search($query)->get()) {
			$previous = $request->session()->get('_previous');
			
			if($previous["url"] != route('konselor.index')) {
				$request->session()->flash('query', $query);
				$request->session()->flash('results', $results);
				$request->session()->flash('searchKonselor', True);
			
				return Redirect::to(URL::previous() . "#konselor");
			}
			
			return view('konselor.search')->with('results', $results);
		}
			
		return redirect()->back()->with('errors', ['Could not retrieve search results.']);
	}

}
