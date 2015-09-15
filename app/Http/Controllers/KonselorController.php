<?php namespace rifka\Http\Controllers;

use rifka\User;
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
		// Only allow authenticated users
		$this->middleware('auth');
		
		// Only allow active users
		$this->middleware('active');
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
	 * Show the form for creating a new counselor.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
		return view('konselor.create');
	}

	/**
	 * Store a newly created counselor in the database.
	 *
	 * @return redirect to the index with success message
	 */
	public function store(Request $request)
	{
		$user_id = null;

		// validate input
		$this->validate($request, [
			'nama_konselor' => 'required|string|alpha|min:3|max:255',
			'email' => 'email|max:128',
		]);

		// check if email corresponds with user
		if (\Input::get('email') != null)
		{
			
			$email = \Input::get('email');
			
			// if the email corresponds to user,
			// the user's id will be attached to the counselor record.
			if (User::where('email', $email)->first()) 
			{
				$user = User::where('email', $email)->first();
				$user_id = $user->id;
			}

		}

		// create the new counselor
		if($konselor = \rifka\Konselor::create([
			'nama_konselor' => \Input::get('nama_konselor'),
			'user_id' 			=> ($user_id == null) ? null : $user_id
			]))
		{
			return redirect()->route('konselor.index')->with('success', 'Created new counsellor.');
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
