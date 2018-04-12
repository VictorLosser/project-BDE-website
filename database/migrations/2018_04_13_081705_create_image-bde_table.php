<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImageBdeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('image-bde', function (Blueprint $table) {
            $table->increments('image_id');
            $table->string('image_link',255);
            $table->string('alt',255);
            $table->morphs('imageable');
            $table->integer('id')->unsigned();
            $table->timestamps();

            $table->engine = 'InnoDB';
        });
        Schema::table('image-bde', function ($table) {
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
        Schema::dropIfExists('image-bde');
    }
}
