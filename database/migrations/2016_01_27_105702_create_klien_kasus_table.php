<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKlienKasusTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('klien_kasus', function(Blueprint $table)
		{
			$table->increments('klien_kasus_id');
			$table->integer('kasus_id')->nullable()->unsigned();
			$table->integer('klien_id')->nullable()->unsigned();
			$table->string('jenis_klien')->nullable();
			$table->timestamp('created_at')->nullable();
			$table->timestamp('updated_at')->nullable();
			$table->timestamp('deleted_at')->nullable();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('klien_kasus');
	}

}
