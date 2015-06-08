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
			$table->integer('kasus_id')->nullable()->unsigned();
			$table->date('mulai_tanggal')->nullable();
			$table->date('sampai_tanggal')->nullable();
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
		Schema::drop('Shelter');
	}

}
