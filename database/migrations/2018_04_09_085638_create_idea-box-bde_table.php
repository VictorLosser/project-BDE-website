<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIdeaBoxBdeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('idea-box-bde', function (Blueprint $table) {
            $table->increments('idea_box_id');
            $table->string('title',255);
            $table->string('description',255);
            $table->integer('user_id');
            $table->foreign('users_id')->references('user_id')->on('users-bde');
            $table->engine = 'InnoDB';

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('idea-box-bde');
    }
}
