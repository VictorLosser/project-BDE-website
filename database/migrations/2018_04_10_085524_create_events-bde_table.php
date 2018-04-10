<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsBdeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events-bde', function (Blueprint $table) {
            $table->increments('event_id');
            $table->string('title',255);
            $table->string('description',255);
            $table->date('date_event');
            $table->decimal('price', 10, 2);
            $table->string('recurrence',255);
            $table->integer('user_id');
            $table->foreign('users_id')->references('user_id')->on('users-bde');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events-bde');
    }
}
