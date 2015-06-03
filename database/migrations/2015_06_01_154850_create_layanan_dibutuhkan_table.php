<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLayananDibutuhkanTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('Layanan_Dibutuhkan', function(Blueprint $table)
		{
			$table->increments('layanan_dbth_id');
			$table->integer('kasus_id')->unsigned();
			$table->string('jenis_layanan');
			$table->string('status');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('Layanan_Dibutuhkan');
	}

}
