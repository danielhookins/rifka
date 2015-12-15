<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSymptomsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('symptoms', function(Blueprint $table)
		{
			$table->increments('symptom_id');
			$table->integer('kasus_id')->nullable()->unsigned();
			$table->string('symptom_description')->nullable();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('symptoms');
	}

}
