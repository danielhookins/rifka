<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLatarKeluargaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('Latar_Keluarga', function(Blueprint $table)
		{
			$table->increments('latar_keluarga_id');
			$table->integer('klien_id')->unsigned();
			$table->boolean('kkrsn_masa_lalu');
			$table->boolean('menyaksikan_kkrsn_rt');
			$table->boolean('lingkungan_toleran_kkrsn');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('Latar_Keluarga');
	}

}
