<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReviewCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('review_categories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('slug')->unique();
            $table->boolean('is_published')->default(true);
            $table->boolean('enable_low_rating')->default(true);

            $table->timestamps();
        });

        Schema::create('review_category_translations', function(Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('review_category_id');
            $table->string('title');
            $table->string('locale')->index();

            $table->unique(['review_category_id', 'locale']);

            $table->foreign('review_category_id')
                ->references('id')
                ->on('review_categories')
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
        Schema::dropIfExists('review_category_translations');
        Schema::dropIfExists('review_categories');
    }
}
