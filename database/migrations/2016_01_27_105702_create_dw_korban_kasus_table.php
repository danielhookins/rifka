<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDWKorbanKasusTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('dw_korban_kasus', function(Blueprint $table)
		{
			$table->increments('korban_kasus_id');
			$table->integer('kasus_id')->nullable()->unsigned();
			$table->integer('klien_id')->nullable()->unsigned();
			$table->string('nama_klien')->nullable();
			$table->string('agama')->nullable();
			$table->string('pendidikan')->nullable();
			$table->string('pekerjaan')->nullable();
			$table->string('penghasilan')->nullable();
			$table->string('status_perkawinan')->nullable();
			$table->string('kondisi_klien')->nullable();
			$table->string('kabupaten')->nullable();
			$table->string('jenis_kasus')->nullable();
			$table->string('hubungan')->nullable();
			$table->string('harapan_korban')->nullable();
			$table->integer('usia')->nullable();
			$table->integer('tahun')->nullable();
			$table->timestamp('created_at')->nullable();
			$table->timestamp('updated_at')->nullable();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('dw_korban_kasus');
	}

}
