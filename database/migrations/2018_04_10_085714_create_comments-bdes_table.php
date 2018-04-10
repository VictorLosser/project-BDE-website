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
            $table->integer('image_id');
            $table->foreign('image_id')->references('image_id')->on('image-bde');
            $table->integer('user_id');
            $table->foreign('users_id')->references('user_id')->on('users-bde');
            $table->integer('event_id');
            $table->foreign('event_id')->references('event_id')->on('event-bde');
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
