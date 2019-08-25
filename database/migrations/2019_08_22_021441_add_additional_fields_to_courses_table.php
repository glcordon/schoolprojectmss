<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAdditionalFieldsToCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('courses', function (Blueprint $table) {
            
            $table->string('course_description', 1000)->nullable()->after('course_title');
            
            $table->integer('category')->unsigned()->nullable()->after('course_title');
                        
            $table->string('course_difficulty', 100)->nullable()->after('course_title');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('courses', function (Blueprint $table) {
            
            $table->dropColumn('course_difficulty');
            $table->dropColumn('category');
            $table->dropColumn('course_description');
            
        });
    }
}
