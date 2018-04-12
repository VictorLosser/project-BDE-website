<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductBdeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product-bde', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title',255);
            $table->text('description');
            $table->decimal('price', 10, 2);
            $table->integer('category_id')->unsigned();
            $table->timestamps();

            $table->engine = 'InnoDB';
        });
        Schema::table('product-bde', function ($table) {
            $table->foreign('category_id')->references('id')->on('product-category-bde');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product-bde');
    }
}
