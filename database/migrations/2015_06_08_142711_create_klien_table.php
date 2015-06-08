<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKlienTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('Klien', function(Blueprint $table)
		{
			$table->increments('klien_id');
			$table->string('nama_klien')->nullable();
			$table->string('kelamin')->nullable();
			$table->string('tempat_lahir')->nullable();
			$table->date('tanggal_lahir')->nullable();
			$table->string('no_telp')->nullable();
			$table->integer('alamat_ktp')->nullable()->unsigned();
			$table->integer('alamat_domisili')->nullable()->unsigned();
			$table->string('email')->nullable();
			$table->string('pendidikan')->nullable();
			$table->boolean('tamat')->nullable();
			$table->string('agama')->nullable();
			$table->string('pekerjaan')->nullable();
			$table->string('jabatan')->nullable();
			$table->string('penghasilan')->nullable();
			$table->string('status_perkawinan')->nullable();
			$table->integer('jumlah_tanggungan')->nullable();
			$table->integer('jumlah_anak')->nullable();
			$table->string('kondisi_klien')->nullable();
			$table->string('dirujuk_oleh')->nullable();
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
		Schema::drop('Klien');
	}

}
