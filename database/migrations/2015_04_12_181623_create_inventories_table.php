<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInventoriesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('inventories', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('registration')->unique();
			$table->string('brand');
			$table->string('model');
			$table->string('variant');
			$table->string('fuel_type');
			$table->string('model_year');
			$table->string('colour');
			$table->string('owner');
			$table->string('owner_id');

			$table->dateTime('purchase_date')->nullable();
			$table->string('seller_name');
			$table->string('seller_address');
			$table->string('seller_contact');
			$table->string('seller_dealer_name');
			$table->string('seller_dealer_address');
			$table->string('seller_dealer_contact');
			$table->float('purchase_amount');
			$table->float('expenses');

			$table->dateTime('selling_date')->nullable();
			$table->string('purchaser_name');
			$table->string('purchaser_address');
			$table->string('purchaser_contact');
			$table->string('purchase_dealer_name');
			$table->string('purchase_dealer_address');
			$table->string('purchase_dealer_contact');
			$table->float('sold_amount');

			$table->dateTime('transfer_date')->nullable();
			$table->string('transfer_mediator');
			$table->string('mediator_contact');

			$table->string('finance_bank');
			$table->string('finance_contact');
			$table->string('finance_amount');

			$table->integer('user_id')->nullable()->unsigned();
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
		Schema::drop('inventories');
	}

}
