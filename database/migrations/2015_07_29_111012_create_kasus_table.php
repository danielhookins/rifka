<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKasusTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('kasus', function(Blueprint $table)
		{
			$table->increments('kasus_id');
			$table->string('jenis_kasus')->nullable();
			$table->string('hubungan')->nullable();
			$table->integer('lama_hubungan')->nullable();
			$table->string('jenis_lama_hub')->nullable();
			$table->date('sejak_kapan')->nullable();
			$table->integer('seberapa_sering')->nullable();
			$table->string('harapan_korban')->nullable();
			$table->string('rencana_korban')->nullable();
			$table->longText('narasi')->nullable();
			$table->timestamp('created_at')->nullable();
			$table->timestamp('updated_at')->nullable();
			$table->timestamp('deleted_at')->nullable();
			$table->string('legacy_konselor')->nullable();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('kasus');
	}

}
