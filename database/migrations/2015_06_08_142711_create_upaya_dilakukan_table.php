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
			$table->integer('kasus_id')->nullable()->unsigned();
			$table->string('jenis_upaya')->nullable();
			$table->string('hasil')->nullable();
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
