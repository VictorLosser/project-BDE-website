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
            $table->integer('id')->unsigned();
            $table->timestamps();
            $table->engine = 'InnoDB';

        });
        Schema::table('idea-box-bde', function ($table) {
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
        Schema::dropIfExists('idea-box-bde');
    }
}
