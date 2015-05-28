<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLitigasiTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('Litigasi', function(Blueprint $table)
		{
			$table->increments('litigasi_id');
			$table->integer('kasus_id')->unsigned();
			$table->string('jenis_litigasi');
			$table->string('udang_digunakan');
			$table->string('kepolisian_wilayah');
			$table->string('nama_penyidik');
			$table->string('pengadilan_wilayah');
			$table->string('nama_hakim');
			$table->string('nama_jaksa');
			$table->string('tuntutan');
			$table->string('putusan');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('Litigasi');
	}

}
