<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsBdeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments-bde', function (Blueprint $table) {
            $table->increments('comment_id');
            $table->string('content');
            $table->integer('image_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->integer('event_id')->unsigned();

            $table->engine = 'InnoDB';

        });
        Schema::table('comments-bde', function ($table) {
            $table->foreign('image_id')->references('image_id')->on('image-bde');
            $table->foreign('user_id')->references('user_id')->on('users');
            $table->foreign('event_id')->references('event_id')->on('events-bde');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments-bde');
    }
}
