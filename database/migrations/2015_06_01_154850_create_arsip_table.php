<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArsipTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('Arsip', function(Blueprint $table)
		{
			$table->increments('arsip_id');
			$table->integer('kasus_id')->unsigned();
			$table->integer('no_reg');
			$table->string('lokasi');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('Arsip');
	}

}
