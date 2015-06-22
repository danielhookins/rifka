<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();
        
        $this->call('DefaultAdminSeeder'); //TODO: DELETE BEFORE PRODUCTION !
        $this->call('KamusTablesSeeder');
		$this->call('KamusAttributesSeeder');
	}

}

