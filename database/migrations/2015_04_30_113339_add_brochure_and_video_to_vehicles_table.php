<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddBrochureAndVideoToVehiclesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('vehicles', function(Blueprint $table)
		{
            $table->string('brochure')->nullable();
            $table->string('video_script')->nullable();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('vehicles', function(Blueprint $table)
		{
            $table->dropColumn('brochure');
            $table->dropColumn('video_script');
		});
	}

}
