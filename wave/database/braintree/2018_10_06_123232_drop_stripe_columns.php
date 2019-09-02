<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class DropStripeColumns extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('subscriptions', function(Blueprint $table)
		{
			$table->dropColumn('stripe_id');
			$table->dropColumn('stripe_plan');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('subscriptions', function ($table) {
		    $table->string('stripe_id');
		    $table->string('stripe_plan');
		});
	}

}
