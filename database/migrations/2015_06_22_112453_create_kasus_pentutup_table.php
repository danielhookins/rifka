<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKasusPentutupTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('Kasus_Pentutup', function(Blueprint $table)
		{
			$table->increments('kasus_pentutup_id');
			$table->integer('kasus_id')->nullable()->unsigned();
			$table->integer('evaluasi_kons_id')->nullable()->unsigned();
			$table->integer('evaluasi_akhir_id')->nullable()->unsigned();
			$table->date('tanggal')->nullable();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('Kasus_Pentutup');
	}

}
