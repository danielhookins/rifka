<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKegiatanLitigasiTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('kegiatan_litigasi', function(Blueprint $table)
		{
			$table->increments('kegiatan_litigasi_id');
			$table->integer('litigasi_id')->nullable()->unsigned();
			$table->date('tanggal')->nullable();
			$table->string('kegiatan')->nullable();
			$table->string('informasi')->nullable();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('kegiatan_litigasi');
	}

}
