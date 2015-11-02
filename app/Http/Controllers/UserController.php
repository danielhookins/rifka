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
		// Only allow authenticated users
		$this->middleware('auth');
		
		// Only allow active users
		$this->middleware('active');
		
	}

	public function show($user_id)
	{
		if ($user = User::find($user_id))
		{
			return view('user.show', [
				'user' => $user]);	
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
	private function setActiveStatus($user_id, $status)
	{
		$user =  User::findOrFail($user_id);
		$user->active = $status;

		return $user->save();
	}

	/**
	 *  Delete an inactive user
	 *	- ensures user is not active before deleteing.
	 *
	 *  @param int user_id The ID fo the inactive user to delete
	 */
	private function deleteInactive($user_id)
	{
		$user = User::findOrFail($user_id);
		
		if($user->active == 0)
		{
			$user->delete();
		}
		
		return;

		// TODO: Add user feedback - eg. User deleted or
		// user does not exist, or user is active. cannot delete.

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

				// resource updated
				return redirect()->route('user.show', $user_id);

			} Catch (Exception $e) {
				// Could not update resource
				return $e;
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
			return "Error. Tidak bisa gantikan kata sandi.";		
		}

		// Delete button clicked
		else if(\Input::get('deleteBtn'))
		{
			$this->deleteInactive($user_id);
		} 
		
		// Activate button clicked
		else if(\Input::get('activateBtn'))
		{
			if(\Input::get('activate') == '1')
			{
				// Activate the user
				$this->setActiveStatus($user_id, true);
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
					$konselor = \rifka\Konselor::create([
						'nama_konselor' => $user->name,
						'user_id' 			=> $user_id
						]);
				}

			}
		}

		return redirect()->route('user.management');

	}

}