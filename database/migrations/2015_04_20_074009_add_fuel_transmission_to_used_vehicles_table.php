<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFuelTransmissionToUsedVehiclesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('used_vehicles', function(Blueprint $table)
		{
            $table->string('transmission_type')->nullable();
            $table->string('fuel_type')->nullable();;
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('used_vehicles', function(Blueprint $table)
		{
            $table->dropColumn('transmission_type');
            $table->dropColumn('fuel_type');
		});
	}
}
