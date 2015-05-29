<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBentukKekerasanTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('Bentuk_Kekerasan', function(Blueprint $table)
		{
			$table->increments('bentuk_id');
			$table->integer('kasus_id')->unsigned();
			$table->string('jenis_bentuk');
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
		Schema::drop('Bentuk_Kekerasan');
	}

}
