<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKlienKasusTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('Klien_Kasus', function(Blueprint $table)
		{
			$table->increments('klien_kasus_id');
			$table->integer('kasus_id')->unsigned();
			$table->integer('klien_id')->unsigned();
			$table->string('jenis_klien');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('Klien_Kasus');
	}

}
