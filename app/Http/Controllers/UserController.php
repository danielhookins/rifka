<?php namespace rifka\Http\Controllers;

use rifka\Http\Requests;
use rifka\Http\Controllers\Controller;
use Illuminate\Http\Request;
use rifka\User;
//use Auth;
use DB;
use rifka\KlienKasus;

class UserController extends Controller {

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

}