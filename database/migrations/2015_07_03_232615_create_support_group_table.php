<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSupportGroupTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('support_group', function(Blueprint $table)
		{
			$table->increments('support_group_id');
			$table->integer('kasus_id')->nullable()->unsigned();
			$table->date('tanggal')->nullable();
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
		Schema::drop('support_group');
	}

}
