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
            $table->integer('event_id')->unsigned();
            $table->integer('product_id')->unsigned();
            $table->integer('user_id')->unsigned();

            $table->engine = 'InnoDB';
        });
        Schema::table('image-bde', function ($table) {
            $table->foreign('event_id')->references('event_id')->on('events-bde');
            $table->foreign('product_id')->references('product_id')->on('product-bde');
            $table->foreign('user_id')->references('user_id')->on('users');
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
