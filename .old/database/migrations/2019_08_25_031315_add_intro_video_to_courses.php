<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddIntroVideoToCourses extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('courses', function (Blueprint $table) {
            
            $table->string('course_intro_video', 300)->nullable();
            $table->string('course_video_thumb', 300)->nullable();
            
            //
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
            
            $table->dropColumn('course_intro_video');
            $table->dropColumn('course_video_thumb');
            
        });
    }
}
