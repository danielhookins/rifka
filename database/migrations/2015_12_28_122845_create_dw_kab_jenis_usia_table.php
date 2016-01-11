<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDwKabJenisUsiaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('dw_kab_jenis_usia', function(Blueprint $table)
		{
			$table->increments('kab_jenis_usia_id');
			$table->integer('kasus_id')->nullable()->unsigned();
			$table->integer('klien_id')->nullable()->unsigned();
			$table->string('kabupaten')->nullable();
			$table->string('jenis_kasus')->nullable();
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
		Schema::drop('dw_kab_jenis_usia');
	}

}
