<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name');
			$table->string('email')->unique();
			$table->string('password', 60);
            $table->boolean('confirmed')->default(0)->index();
            $table->string('confirmation_code')->nullable();
            $table->enum('status', ['ACTIVE','IN-ACTIVE','PENDING-APPROVAL'])->default('ACTIVE')->index();
            $table->enum('role', ['ADMIN','DEALER','WEB-USER'])->default('WEB-USER')->index();
			$table->rememberToken();
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
		Schema::drop('users');
	}

}
