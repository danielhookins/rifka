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
		Schema::create('litigasi', function(Blueprint $table)
		{
			$table->increments('litigasi_id');
			$table->integer('kasus_id')->nullable()->unsigned();
			$table->string('jenis_litigasi')->nullable();
			$table->string('undang_digunakan')->nullable();
			$table->string('kepolisian_wilayah')->nullable();
			$table->string('nama_penyidik')->nullable();
			$table->string('pengadilan_wilayah')->nullable();
			$table->string('nomor_perkara')->nullable();
			$table->string('nama_hakim')->nullable();
			$table->string('nama_jaksa')->nullable();
			$table->string('tuntutan')->nullable();
			$table->string('putusan')->nullable();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('litigasi');
	}

}
