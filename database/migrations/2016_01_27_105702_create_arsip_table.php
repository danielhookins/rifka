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
		Schema::create('arsip', function(Blueprint $table)
		{
			$table->increments('arsip_id');
			$table->integer('kasus_id')->nullable()->unsigned();
			$table->integer('no_reg')->nullable();
			$table->string('media')->nullable();
			$table->string('lokasi')->nullable();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('arsip');
	}

}
