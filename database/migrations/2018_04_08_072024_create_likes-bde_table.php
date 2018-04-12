<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLikesBDETable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('likes-bde', function (Blueprint $table) {
            $table->increments('like_id');
            $table->morphs('likeable');
            $table->integer('id')->unsigned();
            $table->timestamps();
        });
        Schema::table('likes-bde', function ($table) {
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
        Schema::dropIfExists('likes-bde');
    }
}
