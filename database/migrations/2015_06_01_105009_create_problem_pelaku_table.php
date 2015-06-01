<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProblemPelakuTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('Problem_Pelaku', function(Blueprint $table)
		{
			$table->increments('problem_palaku_id');
			$table->integer('palaku_id')->unsigned();
			$table->integer('problem_id')->unsigned();
			$table->timestamp('created_at');
			$table->timestamp('updated_at');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('Problem_Pelaku');
	}

}
