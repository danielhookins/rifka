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
		Schema::create('bentuk_kekerasan', function(Blueprint $table)
		{
			$table->increments('bentuk_id');
			$table->integer('kasus_id')->nullable()->unsigned();
			$table->boolean('emosional')->nullable();
			$table->boolean('fisik')->nullable();
			$table->boolean('ekonomi')->nullable();
			$table->boolean('seksual')->nullable();
			$table->boolean('sosial')->nullable();
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
		Schema::drop('bentuk_kekerasan');
	}

}
