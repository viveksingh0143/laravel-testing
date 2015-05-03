<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsedVehiclesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('used_vehicles', function(Blueprint $table)
		{
            $table->increments('id');
            $table->integer('vehicle_id')->unsigned();
            $table->integer('dealer_id')->unsigned();
            $table->string('colour')->nullable();
            $table->string('model_year')->nullable();
            $table->string('kilometers')->nullable();
            $table->float('price')->unsigned()->nullable();
            $table->boolean('insurance')->default(false);
            $table->string('thumbnail')->nullable();

            $table->string('country')->default("INDIA");
            $table->string('state')->nullable();
            $table->string('city')->nullable();
            $table->string('location')->nullable();
            $table->string('address')->nullable();
            $table->string('pincode')->nullable();

            $table->enum('status', ['ACTIVE','IN-ACTIVE','PENDING-APPROVAL'])->default('ACTIVE')->index();
            $table->timestamps();

            $table->foreign('vehicle_id')->references('id')->on('vehicles')->onDelete('cascade');
            $table->foreign('dealer_id')->references('id')->on('dealers')->onDelete('cascade');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('used_vehicles');
	}

}
