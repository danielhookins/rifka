<?php 
namespace rifka\Library;

use rifka\User;
use Hash;
 
/**
 *	A Library of Utilities for User specific tasks.
 */
class UserUtils
{
	/**
	 *	Check whether a given user_id relates to a real user.
	 * 
	 *	@param int $user_id
	 *	@return boolean
	 */
	public static function isRealUser($user_id)
	{
		return (User::find($user_id)) ? true : false;
	}

	/**
	 *	Change a user's password based on their input in the
	 *	change password form.
	 */
	public static function changePassword($user_id, $passwordNew, $passwordAgain) 
	{
		// Ensure passwords match
		if ($passwordNew == $passwordAgain) {
			$user = User::findOrFail($user_id);
			$password = Hash::make($passwordNew); 

			$user->password = $password;
			$user->save();

			return true;
		}
		return false;
	}

}