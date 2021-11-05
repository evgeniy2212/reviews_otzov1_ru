<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReviewVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('review_videos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('review_id')->unsigned();
            $table->string('src', 200);
            $table->string('name', 200)->default('');
            $table->string('original_name', 200)->default('');
            $table->string('alt', 100)->default('');
            $table->boolean('is_main')->default(true);
            $table->boolean('is_new')->default(false);

            $table->foreign('review_id')->references('id')->on('reviews');
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
        Schema::dropIfExists('review_videos');
    }
}
