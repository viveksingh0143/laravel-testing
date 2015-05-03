<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewVehiclesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('new_vehicles', function(Blueprint $table)
		{
            $table->increments('id');
            $table->integer('vehicle_id')->unsigned();
            $table->integer('dealer_id')->unsigned();
            $table->float('price')->unsigned()->nullable();
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
		Schema::drop('new_vehicles');
	}

}
