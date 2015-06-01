<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMensProgramTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('Mens_Program', function(Blueprint $table)
		{
			$table->increments('mens_program_id');
			$table->integer('kasus_id')->unsigned();
			$table->date('tanggal');
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
		Schema::drop('Mens_Program');
	}

}
