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
		Schema::create('mediasi', function(Blueprint $table)
		{
			$table->increments('mediasi_id');
			$table->integer('kasus_id')->nullable()->unsigned();
			$table->date('tanggal')->nullable();
			$table->string('hasil')->nullable();
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
		Schema::drop('mediasi');
	}

}
