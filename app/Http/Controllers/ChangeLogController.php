<?php namespace rifka\Http\Controllers;

//use rifka\Http\Controllers\KlienController;
use rifka\Activity;
use rifka\User;
use rifka\Klien;
use rifka\Kasus;
use DB;

class ChangeLogController extends Controller {

	// TODO: Refactor - repeated code.

	public function showClientChanges($id)
	{

		$klien = Klien::findOrFail($id);

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
				activity.created_at as created_at'))
				->where('klien_id', $klien->klien_id);
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
			->where('klien_id', $klien->klien_id)
			->union($activity)
			->orderBy('created_at', 'desc')
			->get();

		return view('klien.log', array(
			'log' => $log,
			'klien' => $klien));
	}

	public function showCaseChanges($id)
	{
		
		$kasus = Kasus::findOrFail($id);

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
				activity.created_at as created_at'))
				->where('kasus_id', $kasus->kasus_id);
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
			->where('kasus_id', $kasus->kasus_id)
			->union($activity)
			->orderBy('created_at', 'desc')
			->get();

		return view('kasus.log', array(
			'log' => $log,
			'kasus' => $kasus));
	}

}