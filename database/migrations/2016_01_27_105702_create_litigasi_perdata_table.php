<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLitigasiPerdataTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('litigasi_perdata', function(Blueprint $table)
		{
			$table->increments('litigasi_perdata_id');
			$table->integer('kasus_id')->nullable()->unsigned();
			$table->string('nomor_perkara')->nullable();
			$table->string('pengadilan_wilayah_jenis')->nullable();
			$table->string('pengadilan_wilayah_kabupaten')->nullable();
			$table->string('nama_hakim')->nullable();
			$table->string('cerai')->nullable();
			$table->string('putusan_status')->nullable();
			$table->string('diterima')->nullable();
			$table->string('nafkah')->nullable();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('litigasi_perdata');
	}

}
