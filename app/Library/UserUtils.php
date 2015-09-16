<?php 
namespace rifka\Library;

use rifka\User;
 
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
}