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
            $table->integer('id')->unsigned();
            $table->morphs('commentable');
            $table->timestamps();

            $table->engine = 'InnoDB';

        });
        Schema::table('comments-bde', function ($table) {
            $table->foreign('id')->references('id')->on('users');
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
