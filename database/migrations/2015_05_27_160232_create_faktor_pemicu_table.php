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
		Schema::create('Faktor_Pemicu', function(Blueprint $table)
		{
			$table->increments('pemicu_id');
			$table->integer('kasus_id')->unsigned();
			$table->string('jenis_pemicu');
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
		Schema::drop('Faktor_Pemicu');
	}

}
