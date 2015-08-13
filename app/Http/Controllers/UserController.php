<?php namespace rifka\Http\Controllers;

use rifka\Http\Requests;
use rifka\Http\Controllers\Controller;
use Illuminate\Http\Request;
use rifka\User;
use DB;
use rifka\KlienKasus;

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

	public function index()
	{
		//
	}

	public function show($user_id)
	{
		if ($user = User::find($user_id))
		{
			return view('user.show', [
				'user' => $user,
				'log' => $this->getLog($user_id)]);
		}
		
		return redirect('404');

	}

	private function getLog($user_id)
	{
		// Get a union of Activity and Attribute_Change tables
		$activity = DB::table('activity')
			->join('users', 'user_id', '=', 'id')
			->select(DB::raw('
				user_id,
				users.name as username,
				klien_id,
				kasus_id,
				action,
				null as attribute_name,
				null as old_attribute_value,
				null as new_attribute_value,
				activity.created_at as created_at'))
				->where('user_id', $user_id);
		$log = DB::table('attribute_change')
			->join('users', 'user_id', '=', 'id')
			->select(DB::raw('
				user_id,
				users.name as username,
				klien_id,
				kasus_id,
				null as action,
				attribute_name,
				old_attribute_value,
				new_attribute_value,
				attribute_change.created_at as created_at'))
			->where('user_id', $user_id)
			->union($activity)
			->orderBy('created_at', 'desc')
			->get();

		return $log;

	}

	/**
	 *  Show the user management page.
	 */
	public function management() 
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
	public function activate($user_id)
	{
		$user =  User::findOrFail($user_id);
		$user->active = true;
		$user->save();

		return redirect()->back();
	}

	/**
	 *  Delete an inactive user
	 *
	 *  @param int user_id The ID fo the inactive user to delete
	 */
	public function deleteInactive($user_id)
	{
		$user = User::findOrFail($user_id);
		
		if($user->active == 0)
		{
			$user->delete();
		}
		
		return redirect()->route('user.management');

		// TODO: Add user feedback - eg. User deleted or
		// user does not exist, or user is active. cannot delete.

	}
}