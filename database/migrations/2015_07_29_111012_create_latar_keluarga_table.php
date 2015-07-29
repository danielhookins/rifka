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
		Schema::create('latar_keluarga', function(Blueprint $table)
		{
			$table->increments('latar_keluarga_id');
			$table->integer('klien_id')->nullable()->unsigned();
			$table->boolean('kkrsn_masa_lalu')->nullable();
			$table->boolean('menyaksikan_kkrsn_rt')->nullable();
			$table->boolean('lingkungan_toleran_kkrsn')->nullable();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('latar_keluarga');
	}

}
