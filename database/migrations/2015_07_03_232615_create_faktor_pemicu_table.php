<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFaktorPemicuTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('faktor_pemicu', function(Blueprint $table)
		{
			$table->increments('pemicu_id');
			$table->integer('kasus_id')->nullable()->unsigned();
			$table->string('jenis_pemicu')->nullable();
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
		Schema::drop('faktor_pemicu');
	}

}
