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
			$table->integer('ibu_id')->unsigned();
			$table->string('nama_anak');
			$table->date('tanggal_lahir');
			$table->string('pendidikan');
			$table->string('pekerjaan');
			$table->string('keterangan');
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
