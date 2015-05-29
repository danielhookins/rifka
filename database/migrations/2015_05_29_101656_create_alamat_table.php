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
			$table->string('alamat');
			$table->string('kecamatan');
			$table->string('kabupaten');
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
