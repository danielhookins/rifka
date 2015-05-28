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
			$table->string('jenis_klien');
			$table->string('nama_klien');
			$table->string('tempat_lahir');
			$table->date('tanggal_lahir');
			$table->string('no_telp');
			$table->integer('alamat_ktp')->unsigned();
			$table->integer('alamat_domisili')->unsigned();
			$table->string('pendidikan');
			$table->boolean('tamat');
			$table->string('agama');
			$table->string('pekerjaan');
			$table->string('jabatan');
			$table->string('penghasilan');
			$table->string('status_perkawinan');
			$table->integer('jumlah_tanggungan');
			$table->integer('jumlah_anak');
			$table->string('kondisi_klien');
			$table->string('dirujuk_oleh');
			$table->timestamp('created_at');
			$table->timestamp('updated_at');
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
