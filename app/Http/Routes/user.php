<?php

	// User related routes
	
	/**
	 *  Laravel 5 built-in authorization controllers.
	 */
	Route::controllers([
		'auth' => 'Auth\AuthController',
		'password' => 'Auth\PasswordController']);

	/**
	 *  Specific named route to log the current user out.
	 *
	 *  @return Redirect to root.
	 */
	Route::get('logout', [
		'as' => 'logout', 
		function() 
		{
			Auth::logout();
			return redirect('/');
		}]);

	/**
	 *	Show the user change-password page
	 */
	Route::get('user/{user_id}/changePassword', [
		'as' => 'user.changePassword',
		'uses' => 'UserController@changePassword',
		'middleware' => ['userType:Manager,Developer']]);

	/**
	 *  Show the user management page
	 *  where authorised users can manage user accounts
	 */
	Route::get('manage/users', [
		'as' => 'user.management',
		'uses' => 'UserController@showUserManagement',
		'middleware' => ['userType:Manager,Developer']]);

	Route::get('user/{user_id}/delete',[
		'as' => 'user.deleteConfirm',
		'uses' => 'UserController@deleteConfirm',
		'middleware' => ['userType:Manager,Developer']]);

	Route::post('user/deleteUser',[
		'as' => 'user.deleteUser',
		'uses' => 'UserController@deleteUser',
		'middleware' => ['userType:Manager,Developer']]);