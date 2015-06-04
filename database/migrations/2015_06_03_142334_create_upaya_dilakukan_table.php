<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUpayaDilakukanTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('Upaya_Dilakukan', function(Blueprint $table)
		{
			$table->increments('upaya_id');
			$table->integer('kasus_id')->unsigned();
			$table->string('jenis_upaya');
			$table->string('hasil');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('Upaya_Dilakukan');
	}

}
