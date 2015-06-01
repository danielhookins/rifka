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
		Schema::create('Support_Group', function(Blueprint $table)
		{
			$table->increments('support_group_id');
			$table->integer('kasus_id')->unsigned();
			$table->date('tanggal');
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
		Schema::drop('Support_Group');
	}

}
