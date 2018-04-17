<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContainProductBdeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contain-product-bde', function (Blueprint $table) {
            $table->integer('quantity');
            $table->integer('product_id')->unsigned();
            $table->integer('order_id')->unsigned();
            $table->timestamps();

            $table->primary(array('product_id','order_id'));

            $table->engine = 'InnoDB';
        });
        Schema::table('contain-product-bde', function ($table) {
            $table->foreign('product_id')->references('id')->on('product-bde');
            $table->foreign('order_id')->references('id')->on('orders-bde');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contain-product-bde');
    }
}
