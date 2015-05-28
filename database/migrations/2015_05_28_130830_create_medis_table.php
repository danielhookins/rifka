<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMedisTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('Medis', function(Blueprint $table)
		{
			$table->increments('medis_id');
			$table->integer('kasus_id')->unsigned();
			$table->date('tanggal');
			$table->string('jenis_medis');
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
		Schema::drop('Medis');
	}

}
