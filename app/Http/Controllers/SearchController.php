<?php namespace rifka\Http\Controllers;

use rifka\Http\Requests;
use rifka\Http\Controllers\Controller;

use Illuminate\Http\Request;

class SearchController extends Controller {

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		// Ensure only authorised users can search.
		$this->middleware('auth');
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
		return view('home');
	}

	public function search(Request $request)
	{
		$this->validate($request, ['searchQuery' => 'required|max:255']);

		$query = \Input::get('searchQuery');		

		if($searchType = \Input::get('searchType')) {
			
			if($searchType == 'klien'){
				$results = \rifka\Klien::search($query)->orderBy('relevance', 'DESC')->get();
			}
			elseif($searchType == 'kasus'){
				$results = \rifka\Kasus::search($query)->orderBy('relevance', 'DESC')->get();
			}
			elseif($searchType == 'alamat'){
				$results = \rifka\Alamat::search($query)->orderBy('relevance', 'DESC')->get();
			}
			elseif($searchType == 'arsip'){
				$results = \rifka\Arsip::search($query)->orderBy('relevance', 'DESC')->get();
			}

			return view($searchType.'.searchResults', array(
					'query' 	=> $query,
					'results' 	=> $results
				));
		
		}
    	
    	return redirect('home');
	}

}
