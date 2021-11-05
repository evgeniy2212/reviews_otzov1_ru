<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReviewCharacteristicReviewTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('review_review_characteristic', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('review_characteristic_id')->unsigned();
            $table->unsignedBigInteger('review_id')->unsigned();

            $table->foreign('review_characteristic_id')->references('id')->on('review_characteristics')->onDelete('cascade');
            $table->foreign('review_id')->references('id')->on('reviews')->onDelete('cascade');
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
        Schema::dropIfExists('review_review_characteristic');
    }
}
