<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNameToProfile extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('profile_table', function (Blueprint $table) {
            //
            
            $table->string('first_name', 100)->nullable();
            $table->string('last_name', 100)->nullable();
            
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('profile_table', function (Blueprint $table) {
            //
            $table->dropColumn('first_name');
            $table->dropColumn('last_name');
        });
    }
}
