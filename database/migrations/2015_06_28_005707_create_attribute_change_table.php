<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAttributeChangeTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('Attribute_Change', function(Blueprint $table)
		{
			$table->increments('attribute_change_id');
			$table->integer('user_id')->nullable()->unsigned();
			$table->integer('kasus_id')->nullable()->unsigned();
			$table->integer('klien_id')->nullable()->unsigned();
			$table->string('attribute_name')->nullable();
			$table->string('old_attribute_value')->nullable();
			$table->string('new_attribute_value')->nullable();
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
		Schema::drop('Attribute_Change');
	}

}
