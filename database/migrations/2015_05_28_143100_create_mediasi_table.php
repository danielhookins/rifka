<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMediasiTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('Mediasi', function(Blueprint $table)
		{
			$table->increments('mediasi_id');
			$table->integer('kasus_id')->unsigned();
			$table->date('tanggal');
			$table->string('hasil');
			$table->string('keterangan');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('Mediasi');
	}

}
