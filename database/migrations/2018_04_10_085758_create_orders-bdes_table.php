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
            $table->increments('order_id');
            $table->decimal('total_price', 10, 2);
            $table->date('order_date');
            $table->integer('user_id');
            $table->foreign('users_id')->references('user_id')->on('users-bde');
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
