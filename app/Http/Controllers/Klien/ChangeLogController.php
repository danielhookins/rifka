<?php namespace rifka\Http\Controllers\Klien;

use rifka\Http\Controllers\KlienController;
use rifka\Activity;
use rifka\User;
use DB;

class ChangeLogController extends KlienController {

	public function showChanges($id)
	{
		// Get a union of Activity and Attribute_Change tables
		$activity = DB::table('activity')
			->join('users', 'user_id', '=', 'id')
			->select(DB::raw('
				user_id,
				users.name as username,
				klien_id,
				action,
				null as attribute_name,
				null as old_attribute_value,
				null as new_attribute_value,
				activity.created_at as created_at'));
		$log = DB::table('attribute_change')
			->join('users', 'user_id', '=', 'id')
			->select(DB::raw('
				user_id,
				users.name as username,
				klien_id,
				null as action,
				attribute_name,
				old_attribute_value,
				new_attribute_value,
				attribute_change.created_at as created_at'))
			->union($activity)
			->orderBy('created_at', 'desc')
			->get();

		return view('klien.index', array(
			'log' => $log));
	}

}