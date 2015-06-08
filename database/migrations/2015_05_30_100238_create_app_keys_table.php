<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAppKeysTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('app_keys', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('key')->unique();
			$table->string('uuid')->nullable();
			$table->string('fname')->nullable();
			$table->string('lname')->nullable();
			$table->string('email')->nullable();
			$table->integer('dealer_id')->unsigned();
			$table->foreign('dealer_id')->references('id')->on('dealers')->onDelete('cascade');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('app_keys');
	}

}
