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
		Schema::create('alamat_klien', function(Blueprint $table)
		{
			$table->increments('alamat_klien_id');
			$table->integer('alamat_id')->nullable()->unsigned();
			$table->integer('klien_id')->nullable()->unsigned();
			$table->string('jenis')->nullable();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('alamat_klien');
	}

}
