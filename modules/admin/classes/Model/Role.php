<?php defined('SYSPATH') or die('No direct script access!');

/**
* Model to decipher user account roles in the platform
* @package    AutoClub/Role
* @author Mbiarrambang Alain
* @twitter www.twitter.com/mbengchan
*/

  class Model_Role extends Model_Auth_Role
  {
  	//get the user role from the database
  	static function user_role($user_id)
  	{
  		$role_id = DB::select('user_id')
  			->from('roles_users')
  			->where('user_id', '=', $user_id)
  			->as_object()
  			->execute()
  			->get('user_id');

  		return DB::select('name')
  			->from('roles')
  			->where('id', '=', $role_id)
  			->as_object()
  			->execute()
  			->get('name');
  	}
  } 