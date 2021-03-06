<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersBdeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders-bde', function (Blueprint $table) {
            $table->increments('id');
            $table->decimal('total_price', 10, 2);
            $table->date('order_date');
            $table->integer('user_id')->unsigned();
            $table->timestamps();

            $table->engine = 'InnoDB';

        });
        Schema::table('orders-bde', function ($table) {
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
        Schema::dropIfExists('orders-bde');
    }
}
