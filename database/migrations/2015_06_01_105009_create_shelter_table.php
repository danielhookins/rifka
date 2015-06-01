<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShelterTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('Shelter', function(Blueprint $table)
		{
			$table->increments('shelter_id');
			$table->integer('kasus_id')->unsigned();
			$table->date('mulai_tanggal');
			$table->date('sampai_tanggal');
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
		Schema::drop('Shelter');
	}

}
