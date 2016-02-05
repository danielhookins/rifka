<?php namespace rifka\Http\Controllers;

use rifka\User;
use rifka\Http\Requests;
use rifka\Http\Controllers\Controller;
use Illuminate\Http\Request;
use rifka\Library\UserUtils;

class KonselorController extends Controller {

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth');
		$this->middleware('active');
		$this->middleware('userType:Developer,Manager,Konselor');
	}

	/**
	 * Display a listing of all counselors.
	 *
	 * @return counselors index view with counselors or null
	 */
	public function index(Request $request)
	{
		
		// check if counselors exist
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
			'nama_konselor' => 'required|string|min:3|max:255'
		]);

		// create the new counselor
		if($konselor = \rifka\Konselor::create([
			'nama_konselor' => \Input::get('nama_konselor')
			]))
		{
			return redirect()->route('konselor.index')->with('konselorMsgs',['Ditambahkan konselor ' . \Input::get('nama_konselor')]);
		}
		
		return redirect()->back()->with('konselorMsgs', ['Error: tidak bisa tambahkan konselor']);

	}

	/**
	 * Display the counselor.
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
	 * Show the form for editing the counselor.
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
	 * Update the specified counselor in the database.
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
				->with('konselorMsgs', ['Konselor diupdate.']);
		}

		return redirect()->route('konselor.edit', $konselor_id)
			->with('konselorMsgs', ['Tidak bisa update. Tidak bisa cari konselor.']);

	}

	/**
	 * Remove the specified counselor from the database.
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
				$message = array('konselorMsgs', ['Konselor dihapus.']);
			}
			else
			{
				$message = array('konselorMsgs', ['Konselor tidak bisa dihapus.']);
			}
		}
		else
		{
			$message = array('konselorMsgs', ['Konselor tidak bisa dicari']);
		}

		return redirect()->route('konselor.index');

	}

	/**
	 *	Remove multiple selected counselors from the database.
	 *	
	 */
	public function deleteKonselor2()
	{
		
		// declare variable for storing messages
		$messages = array();

		
		if($toDelete = \Input::get('toDelete'))
		{
			
			foreach($toDelete as $konselor_id)
			{
				$konselor = \rifka\Konselor::where('konselor_id', $konselor_id)->first();
				$nama_konselor = $konselor->nama_konselor;
				
				// do not delete counselors attached to a user account.
				if(isset($konselor->user_id) && UserUtils::isRealUser($konselor->user_id))
				{
					array_push($messages, "Tidak bisa hapuskan " . $nama_konselor . 
						" disini. Hapuskan konselor ini di tempat Manajemen User.");
				} 
				
				// counselor not attached to user account - okay to delete.
				else 
				{
					$deleted = $konselor->delete();
					($deleted) ? 
						array_push($messages, "Konselor " . $nama_konselor . " dihapus.") : 
						array_push($messages, "Konselor " . $nama_konselor . " tidak bisa dihapus.");
				}

			}
		} 
		
		// no counselor selected 
		else 
		{
			array_push($messages, "Harus pilih konselor yang Anda mau menghapuskan");
		} 
		
		return redirect()->route('konselor.index')->with('konselorMsgs', $messages);
	
	}

}
