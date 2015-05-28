<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePelakuKasusTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('Pelaku_Kasus', function(Blueprint $table)
		{
			$table->increments('pelaku_kasus_id');
			$table->integer('kasus_id')->unsigned();
			$table->integer('pelaku_id')->unsigned();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('Pelaku_Kasus');
	}

}
