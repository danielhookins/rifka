<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlamatTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('Alamat', function(Blueprint $table)
		{
			$table->increments('alamat_id');
			$table->string('alamat')->nullable();
			$table->string('kecamatan')->nullable();
			$table->string('kabupaten')->nullable();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('Alamat');
	}

}
