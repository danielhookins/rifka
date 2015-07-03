<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePerkembanganTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('perkembangan', function(Blueprint $table)
		{
			$table->increments('perkembangan_id');
			$table->integer('kasus_id')->nullable()->unsigned();
			$table->date('tanggal')->nullable();
			$table->string('intervensi')->nullable();
			$table->string('kesimpulan')->nullable();
			$table->string('kesepakatan')->nullable();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('perkembangan');
	}

}
