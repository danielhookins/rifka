<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKorbanKasusTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('Korban_Kasus', function(Blueprint $table)
		{
			$table->increments('korban_kasus_id');
			$table->integer('kasus_id')->unsigned();
			$table->integer('korban_id')->unsigned();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('Korban_Kasus');
	}

}
