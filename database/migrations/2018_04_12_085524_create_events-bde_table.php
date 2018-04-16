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
            $table->increments('id');
            $table->string('title',255);
            $table->string('description',255);
            $table->date('date_event');
            $table->decimal('price', 10, 2);
            $table->string('recurrence',255);
            $table->integer('user_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();

            $table->engine = 'InnoDB';

        });
        Schema::table('events-bde', function ($table) {
            $table->foreign('user_id')->references('id')->on('users');
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
