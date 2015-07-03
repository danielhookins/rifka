<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKonsHukumTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('kons_hukum', function(Blueprint $table)
		{
			$table->increments('kons_hukum_id');
			$table->integer('kasus_id')->nullable()->unsigned();
			$table->date('tanggal')->nullable();
			$table->string('keterangan')->nullable();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('kons_hukum');
	}

}
