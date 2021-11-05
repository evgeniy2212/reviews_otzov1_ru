<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReviewModerationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('review_moderations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('review_id')->unsigned();
            $table->bigInteger('user_id')->unsigned();
            $table->boolean('is_new')->default(1);
            $table->text('msg')->nullable();

            $table->foreign('review_id')->references('id')->on('reviews')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('review_moderations');
    }
}
