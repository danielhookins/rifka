<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKonsPsikologiTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('Kons_Psikologi', function(Blueprint $table)
		{
			$table->increments('kons_psikologi_id');
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
		Schema::drop('Kons_Psikologi');
	}

}
