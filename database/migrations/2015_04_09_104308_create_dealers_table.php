<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDealersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('dealers', function(Blueprint $table)
		{
            $table->increments('id');
            $table->string('slug')->unique();
            $table->string('email')->unique();
            $table->string('name');
            $table->string('contact_person');
            $table->text('about_us')->nullable();
            $table->string('country')->default("INDIA");
            $table->string('state')->nullable();
            $table->string('city')->nullable();
            $table->string('location')->nullable();
            $table->string('address')->nullable();
            $table->string('pincode')->nullable();
            $table->string('website')->nullable();
            $table->string('mobile_number')->nullable();
            $table->string('office_number')->nullable();
            $table->string('ad_image')->nullable();
            $table->string('logo')->nullable();
            $table->enum('status', ['ACTIVE','IN-ACTIVE','PENDING-APPROVAL'])->default('PENDING-APPROVAL')->index();

            $table->integer('user_id')->unsigned();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('dealers');
	}
}