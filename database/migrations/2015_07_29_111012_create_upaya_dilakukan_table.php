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
		Schema::create('upaya_dilakukan', function(Blueprint $table)
		{
			$table->increments('upaya_id');
			$table->integer('kasus_id')->nullable()->unsigned();
			$table->string('jenis_upaya')->nullable();
			$table->string('hasil')->nullable();
			$table->timestamp('created_at')->nullable();
			$table->timestamp('updated_at')->nullable();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('upaya_dilakukan');
	}

}
