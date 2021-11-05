<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id')->unsigned();
            $table->text('review')->nullable();
            $table->bigInteger('region_id')->unsigned()->nullable();
            $table->bigInteger('country_id')->unsigned()->nullable();
            $table->string('city')->nullable();
            $table->bigInteger('review_category_id')->unsigned()->nullable();
            $table->bigInteger('review_group_id')->unsigned()->nullable();
            $table->bigInteger('category_by_review_id')->unsigned()->nullable();
            $table->string('email')->nullable();
            $table->string('name');
            $table->string('second_name')->nullable();
            $table->tinyInteger('rating')->default(0);
            $table->integer('likes')->default(0);
            $table->integer('dislikes')->default(0);
            $table->string('user_sign')->nullable();
            $table->boolean('is_published')->default(false);
            $table->string('locale')->index();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('region_id')->references('id')->on('regions');
            $table->foreign('country_id')->references('id')->on('countries');
            $table->foreign('review_category_id')->references('id')->on('review_categories')->onDelete('cascade');
            $table->foreign('review_group_id')->references('id')->on('group_by_reviews')->onDelete('cascade');
            $table->foreign('category_by_review_id')->references('id')->on('category_by_reviews')->onDelete('cascade');
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
        Schema::dropIfExists('reviews');
    }
}
