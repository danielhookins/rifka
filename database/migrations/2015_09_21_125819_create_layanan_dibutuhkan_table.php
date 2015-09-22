<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLayananDibutuhkanTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('layanan_dibutuhkan', function(Blueprint $table)
		{
			$table->increments('layanan_dbth_id');
			$table->integer('kasus_id')->nullable()->unsigned();
			$table->string('jenis_layanan')->nullable();
			$table->string('status')->nullable();
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
		Schema::drop('layanan_dibutuhkan');
	}

}
