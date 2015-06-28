<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnakKlienTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('Anak_Klien', function(Blueprint $table)
		{
			$table->increments('anak_id');
			$table->integer('ibu_id')->nullable()->unsigned();
			$table->string('nama_anak')->nullable();
			$table->date('tanggal_lahir')->nullable();
			$table->string('pendidikan')->nullable();
			$table->string('pekerjaan')->nullable();
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
		Schema::drop('Anak_Klien');
	}

}
