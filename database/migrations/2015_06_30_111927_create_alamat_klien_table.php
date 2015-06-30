<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlamatKlienTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('Alamat_Klien', function(Blueprint $table)
		{
			$table->increments('alamat_klien_id');
			$table->integer('klien_id')->nullable()->unsigned();
			$table->integer('alamat_id')->nullable()->unsigned();
			$table->timestamp('created_at')->nullable();
			$table->timestamp('updated_at')->nullable();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('Alamat_Klien');
	}

}
