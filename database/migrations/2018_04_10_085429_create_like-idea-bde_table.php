<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLikeIdeaBdeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('like-idea-bde', function (Blueprint $table) {
            $table->integer('user_id');
            $table->integer('idea_box_id');
            $table->primary('user_id');
            $table->primary('idea_box_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('like-idea-bde');
    }
}
