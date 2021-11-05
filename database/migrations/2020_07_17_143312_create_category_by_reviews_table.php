<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoryByReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category_by_reviews', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('review_category_id')->unsigned()->nullable();
            $table->boolean('is_published')->default(true);

            $table->foreign('review_category_id')->references('id')->on('review_categories')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('category_by_review_translations', function(Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('category_by_review_id');
            $table->string('name');
            $table->string('locale')->index();

            $table->unique(['category_by_review_id', 'locale'], 'cat_by_rev_loc');

            $table->foreign('category_by_review_id', 'cat_by_rev')
                ->references('id')
                ->on('category_by_reviews')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('category_by_review_translations');
        Schema::dropIfExists('category_by_reviews');
    }
}
