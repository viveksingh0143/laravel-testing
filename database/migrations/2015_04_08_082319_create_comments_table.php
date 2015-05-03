<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('comments', function(Blueprint $table)
		{
            $table->increments('id');
            $table->string('name');
            $table->text('body');
            $table->morphs('commentable');
            $table->integer('created_by_id')->unsigned()->nullable();
            $table->enum('status', ['ACTIVE','IN-ACTIVE','PENDING-APPROVAL'])->default('ACTIVE')->index();
            $table->timestamps();

            $table->foreign('created_by_id')->references('id')->on('users')->onDelete('set null');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('comments');
	}

}
