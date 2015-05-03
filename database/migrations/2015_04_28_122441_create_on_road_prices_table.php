<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOnRoadPricesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('on_road_prices', function(Blueprint $table)
		{
            $table->increments('id');
            $table->integer('vehicle_id')->unsigned();
            $table->string('type')->nullable();
            $table->string('state');
            $table->integer('ex_show_room_price')->unsigned()->nullable();
            $table->integer('registration_charge')->unsigned()->nullable();
            $table->integer('insurance_charge')->unsigned()->nullable();
            $table->integer('warehouse_charge')->unsigned()->nullable();
            $table->integer('extended_warranty_charge')->unsigned()->nullable();
            $table->integer('body_care_charge')->unsigned()->nullable();
            $table->integer('essential_kit_charge')->unsigned()->nullable();
            $table->timestamps();
            $table->foreign('vehicle_id')->references('id')->on('vehicles')->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('on_road_prices');
	}

}
