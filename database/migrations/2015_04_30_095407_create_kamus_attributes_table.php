<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKamusAttributesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('kamus_attributes', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('table');
 			$table->string('name');
 			$table->boolean('primary_key');
 			$table->string('foreign_key');
 			$table->string('type');
 			$table->string('description');
 			$table->string('example');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('kamus_attributes');
	}

}
