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
		Schema::create('Perkembangan', function(Blueprint $table)
		{
			$table->increments('perkembangan_id');
			$table->integer('kasus_id')->unsigned();
			$table->date('tanggal');
			$table->string('intervensi');
			$table->string('kesimpulan');
			$table->string('kesepakatan');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('Perkembangan');
	}

}
