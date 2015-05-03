<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddOwnerNumberDescriptionRegisteredAtToUsedVehiclesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('used_vehicles', function(Blueprint $table)
		{
            $table->string('number_of_owners')->nullable();
            $table->text('description')->nullable();
            $table->string('registered_at')->nullable();
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
            $table->dropColumn(['number_of_owners', 'description', 'registered_at']);
        });
	}
}
