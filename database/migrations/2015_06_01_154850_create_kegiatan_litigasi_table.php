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
		Schema::create('Kegiatan_Litigasi', function(Blueprint $table)
		{
			$table->increments('kegiatan_litigasi_id');
			$table->integer('litigasi_id')->unsigned();
			$table->date('tanggal');
			$table->string('kegiatan');
			$table->string('informasi');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('Kegiatan_Litigasi');
	}

}
