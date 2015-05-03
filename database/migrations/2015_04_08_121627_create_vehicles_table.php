<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVehiclesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('vehicles', function(Blueprint $table)
        {
            $table->increments('id')->unique();
            $table->integer('brand_id')->unsigned();
            $table->string('bname');
            $table->string('model');
            $table->string('variant');
            $table->text('description')->nullable();
            $table->string('colour')->nullable();
            $table->string('transmission_type')->nullable();
            $table->string('body_type')->nullable();
            $table->string('fuel_type')->nullable();;
            $table->string('drive_type')->nullable();
            $table->float('price')->unsigned()->nullable();
            $table->integer('seating_capacity')->default('4')->unsigned();
            $table->integer('engine_power')->nullable();

            $table->boolean('power_windows')->default(false);
            $table->boolean('abs')->default(false);
            $table->boolean('rear_defogger')->default(false);
            $table->boolean('inbuilt_music_system')->default(false);
            $table->boolean('sunroof_moonroof')->default(false);
            $table->boolean('anti_theft_immobilizer')->default(false);
            $table->boolean('steering_mounted_controls')->default(false);
            $table->boolean('rear_parking_sensors')->default(false);
            $table->boolean('rear_wash_wiper')->default(false);
            $table->boolean('seat_upholstery')->default(false);
            $table->boolean('adjustable_steering')->default(false);

            $table->string('thumbnail')->nullable();
            $table->enum('status', ['ACTIVE','IN-ACTIVE','PENDING-APPROVAL'])->default('ACTIVE')->index();
            $table->timestamps();
            $table->foreign('brand_id')->references('id')->on('brands')->onDelete('cascade');
        });

        Schema::table('vehicles', function($table)
        {
            $table->dropPrimary( 'id' );
            $table->primary(['brand_id', 'model', 'variant']);
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('vehicles');
	}

}
