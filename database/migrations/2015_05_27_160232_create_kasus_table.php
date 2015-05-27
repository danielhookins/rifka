<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKasusTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('Kasus', function(Blueprint $table)
		{
			$table->increments('kasus_id');
			$table->integer('korban_id')->unsigned();
			$table->string('jenis_kasus');
			$table->string('hubungan');
			$table->integer('lama_hubungan');
			$table->date('sejak_kapan');
			$table->integer('seberapa_sering');
			$table->string('harapan_korban');
			$table->string('rencana_korban');
			$table->longText('narasi');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('Kasus');
	}

}
