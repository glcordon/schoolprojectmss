<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToVoyagerThemeOptionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('voyager_theme_options', function(Blueprint $table)
		{
			$table->foreign('voyager_theme_id')->references('id')->on('voyager_themes')->onUpdate('RESTRICT')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('voyager_theme_options', function(Blueprint $table)
		{
			$table->dropForeign('voyager_theme_options_voyager_theme_id_foreign');
		});
	}

}
