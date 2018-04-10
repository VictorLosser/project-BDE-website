<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImagebdeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('imagebde', function (Blueprint $table) {
            $table->increments('image_id');
            $table->integer('event_id');
            $table->foreign('event_id')->references('event_id')->on('event-bde');
            $table->integer('product_id');
            $table->foreign('product_id')->references('product_id')->on('product-bde');
            $table->integer('users_id');
            $table->foreign('users_id')->references('user_id')->on('users-bde');
            $table->timestamps();
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
        Schema::dropIfExists('imagebde');
    }
}
