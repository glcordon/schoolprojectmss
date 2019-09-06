<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBraintreeTables extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('users', function ($table) {
		    $table->string('braintree_id')->nullable();
		    $table->string('paypal_email')->nullable();
		});

		Schema::table('subscriptions', function ($table) {
		    $table->string('braintree_id');
		    $table->string('braintree_plan');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('subscriptions', function(Blueprint $table)
		{
			$table->dropColumn('braintree_id');
			$table->dropColumn('braintree_plan');
		});
		Schema::table('users', function(Blueprint $table)
		{
			$table->dropColumn('braintree_id');
			$table->dropColumn('paypal_email');
		});
	}

}
