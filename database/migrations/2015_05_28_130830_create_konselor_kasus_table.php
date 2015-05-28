<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKonselorKasusTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('Konselor_Kasus', function(Blueprint $table)
		{
			$table->increments('konselor_kasus_id');
			$table->integer('kasus_id')->unsigned();
			$table->integer('konselor_id')->unsigned();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('Konselor_Kasus');
	}

}
