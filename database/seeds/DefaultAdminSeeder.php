<?php 

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;


/**
 * Creates a default admin user
 * TODO: DELETE BEFORE PRODUCTION !
 */
class DefaultAdminSeeder extends Seeder {

    public function run()
    {
        
        // Create Default Admin
        rifka\User::create([
        	'name' 			=> env('DEFAULT_USER_NAME'),
        	'email'			=> env('DEFAULT_USER_EMAIL'),
        	'password'		=> Hash::make(env('DEFAULT_USER_PASSWORD'))]);
    }

}