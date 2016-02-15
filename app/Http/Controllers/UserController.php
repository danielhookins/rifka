<?php namespace rifka\Http\Controllers;

use rifka\Http\Requests;
use rifka\Http\Controllers\Controller;
use Illuminate\Http\Request;
use rifka\User;
use DB;
use rifka\KlienKasus;
use rifka\Library\ResourceUtils;
use rifka\Library\InputUtils;
use rifka\Library\UserUtils;

class UserController extends Controller {
	
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth');
		$this->middleware('active');
		
	}

	public function show($user_id)
	{
		if ($user = User::find($user_id))
		{
			
			$cases = UserUtils::getUserCases($user_id);

			return view('user.show', [
				'user' => $user,
				'cases' => $cases]);	
		}
		
		return redirect('404');

	}


	/**
	 *  Show the user management page.
	 */
	public function showUserManagement() 
	{

		$users = User::all();
		$inactive = User::where('active', 0)->get();

		return view('user.manage')
			->with('users', $users)
			->with('inactive', $inactive);
	}

	/**
	 *  Activate an inactive user.
	 *
	 *  @param int user_id The ID of the user to activate.
	 */
	private function setActiveStatus($request, $user_id, $status)
	{
		$user =  User::findOrFail($user_id);
		
		try {
			$user->active = $status;
			$user->save();
			$request->session()->flash('success', 'User sudah diaktivasikan');
		} catch (Exception $e) {
			$request->session()->flash('error', 'Tidak bisa aktivasikan user');
		}
		
		return;
	}

	/**
	 *	Set the type of user.
	 *	@param int $user_id - The ID of the user
	 *	@param string $jenis - The new user type
	 *	@return boolean - Saved changes to record?
	 */
	private function setJenis($user_id, $jenis)
	{
		$user = User::findOrFail($user_id);
		
		$user->jenis = $jenis;

		return $user->save();
	}

	/**
	 *	Show the edit user page.
	 */
	public function edit($user_id)
	{
		$user = User::findOrFail($user_id);

		return view('user.edit')
			->with('user', $user);
	}

	/**
	 *	Show the change password page.
	 */
	public function changePassword($user_id) 
	{
		$user = User::findOrFail($user_id);

		return view('user.changePassword')
			->with('user', $user);
	}


	/**
	 *	Update user details.
	 *
	 *	@param int $user_id - The ID of the user.
	 *	@return redirect back
	 */
	public function update(Request $request, $user_id)
	{
		$user = User::findOrFail($user_id);

		// Update button clicked
		if(\Input::get('updateBtn'))
		{
			// Set variables
			$resource = User::findOrFail($user_id);
			$fields = ["name", "email", "jenis", "active"];
			$input = InputUtils::nullifyDefaults(\Input::get());
			
			try {
				ResourceUtils::updateResource($resource, $fields, $input);

				// Resource updated
				$request->session()->flash('success', 'Informasi user sudah diupdate');
				return redirect()->route('user.show', $user_id);

			} Catch (Exception $e) {
				// Could not update resource
				$request->session()->flash('error', 'Tidak bisa update informasi user');
				return redirect()->route('user.show', $user_id);
			}
		}

		// Change password button clicked
		else if(\Input::get('changePasswordBtn'))
		{
			$passwordNew = \Input::get('passwordNew');
			$passwordAgain = \Input::get('passwordAgain');

			if (UserUtils::changePassword($user_id, $passwordNew, $passwordAgain))
			{
				$request->session()->flash('success', 'Kata sandi sudah digantikan.');
				return redirect()->route('user.management');
			}	
			return $request->session()->flash('error', 'Tidak bisa gantikan kata sandi');	
		}

		// Delete button clicked
		else if(\Input::get('deleteBtn'))
		{
			return redirect()->route('user.deleteConfirm', $user_id);
		} 
		
		// Activate button clicked
		else if(\Input::get('activateBtn'))
		{
			if(\Input::get('activate') == '1')
			{
				// Activate the user
				$this->setActiveStatus($request, $user_id, true);
			}

			if(\Input::get('jenis') != null)
			{
				$jenis = \Input::get('jenis');

				// Set the type of user
				$this->setJenis($user_id, $jenis);

				// Add new counsellors and managers to the counsellor table
				// Business logic: this assumes that all managers are also counselors
				if($jenis == "Konselor" || $jenis == "Manager")
				{
					if(\rifka\Konselor::where('user_id', $user_id)->count() == 0) 
					{
						$konselor = \rifka\Konselor::create([
						'nama_konselor' => $user->name,
						'user_id' 			=> $user_id
						]);
					}
				}
			}
		}

		return redirect()->route('user.management');

	}

	public function deleteConfirm($user_id) 
	{
		
		$user = User::findOrFail($user_id);

		return view('user.delete')
			->with('user', $user);
	}


	/**
	 *	Delete a specified user
	 */
	public function deleteUser(Request $request)
	{
		
		$user_id = \Input::get("user_id");

		// TODO add some kind of checks
		// eg. Does this user have cases

		$user = User::findOrFail($user_id);
		$name = $user->name;

		if($user->delete())
		{
			$request->session()->flash('success', 'User '.$name.' dihapus');
		} else {
			$request->session()->flash('error', 'Tidak bisa menghapus user');
		}
		return redirect()->route('user.management');
	}

}