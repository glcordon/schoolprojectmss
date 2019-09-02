<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MakeEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 200);
            $table->string('city', 50)->nullable($value = true);
            $table->string('state', 50);
            $table->string('zip', 10);
            $table->text('description');
            $table->string('street', 300);
            $table->integer('user_id');
            $table->dateTime('start_date');
            $table->dateTime('end_date');
            $table->date('start_sale_date');
            $table->date('end_sale_date');
            $table->integer('is_private');
            $table->string('image', 100)->nullable($value = true);
            $table->string('website', 100)->nullable($value = true);
            $table->string('venu_name', 100)->nullable($value = true);
            $table->string('event_image', 200)->nullable($value = true);
            $table->integer('venu_id')->nullable($value = true);
            $table->integer('category_id')->nullable($value = true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events');
    }
}
