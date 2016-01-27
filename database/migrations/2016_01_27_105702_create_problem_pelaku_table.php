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
		Schema::create('problem_pelaku', function(Blueprint $table)
		{
			$table->increments('problem_palaku_id');
			$table->integer('palaku_id')->nullable()->unsigned();
			$table->integer('problem_id')->nullable()->unsigned();
			$table->timestamp('created_at')->nullable();
			$table->timestamp('updated_at')->nullable();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('problem_pelaku');
	}

}
