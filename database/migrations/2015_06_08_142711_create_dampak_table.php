<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDampakTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('Dampak', function(Blueprint $table)
		{
			$table->increments('dampak_id');
			$table->integer('kasus_id')->nullable()->unsigned();
			$table->string('jenis_dampak')->nullable();
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
		Schema::drop('Dampak');
	}

}
