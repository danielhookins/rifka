<?php namespace rifka\Http\Controllers;

use rifka\Http\Requests;
use rifka\Http\Controllers\Controller;

use Illuminate\Http\Request;

class KonselorController extends Controller {

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
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
		if($konselor2 = \rifka\Konselor::get())
		{
			return view('konselor.index')
				->with('konselor2', $konselor2);
		}

		else return view('konselor.index')
				->with('konselor2', $konselor2 = null);

	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
		return view('konselor.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		//
		$this->validate($request, [
			'nama_konselor' => 'required|string|alpha|min:3|max:255',
			'user_id' => 'unique:users|max:128',
		]);

		if($konselor = \rifka\Konselor::create([
			'nama_konselor' => \Input::get('nama_konselor'),
			'user_id' 			=> (\Input::get('user_id') == null) ? 
				null : \Input::get('user_id')
			]))
		{
			return redirect()->route('konselor.show', $konselor->konselor_id)->with('success', 'Created new counsellor.');
		}
		
		return redirect()->back()->with('errors', ['Could not create counsellor.']);

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $konselor_id
	 * @return Response
	 */
	public function show($konselor_id)
	{
		//
		if($konselor = \rifka\Konselor::find($konselor_id))
		{
			return view('konselor.show')
				->with('konselor', $konselor);
		}

		else return redirect('404');

	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $konselor_id
	 * @return Response
	 */
	public function edit($konselor_id)
	{
		//
		if($konselor = \rifka\Konselor::find($konselor_id))
		{
			return view('konselor.edit')->with('konselor', $konselor);
		}

		else return redirect('404');
	
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $konselor_id
	 * @return Response
	 */
	public function update($konselor_id)
	{
		//
		if($konselor = \rifka\Konselor::find($konselor_id))
		{
			$konselor->nama_konselor = \Input::get('nama_konselor');
			$konselor->user_id = (\Input::get('user_id') == null) ? null : \Input::get('user_id');
			$konselor->save();

			return redirect()->route('konselor.show', $konselor_id)
				->with('success', 'Counsellor updated.');
		}

		return redirect()->route('konselor.edit', $konselor_id)
			->with('errors', ['Could not update. No konselor found']);

	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $konselor_id
	 * @return Response
	 */
	public function destroy($konselor_id)
	{
		//
		if($konselor = \rifka\Konselor::find($konselor_id))
		{
			if($konselor->delete())
			{
				$message = array('success', 'Deleted Konselor.');
			}
			else
			{
				$message = array('errors', ['Could not delete counsellor.']);
			}
		}
		else
		{
			$message = array('errors', ['Could not find counsellor.']);
		}

		return redirect()->route('konselor.index')
			->with($message);

	}

	public function search(Request $request)
	{
		$this->validate($request, [
			'search_query' => 'required|max:255'
		]);

		if($query = \Input::get('search_query'))
		{
			if($results = \rifka\Konselor::search($query)->get())
			{
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

	public function deleteKonselor2()
	{
		if($toDelete = \Input::get('toDelete'))
		{
			foreach($toDelete as $konselor_id)
			{
				$deleted[$konselor_id] = \rifka\Konselor::where('konselor_id', $konselor_id)
						->delete();
			}
		} 
		return redirect()->route('konselor.index');
	}

}
