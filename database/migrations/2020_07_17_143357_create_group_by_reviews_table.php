<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGroupByReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('group_by_reviews', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('category_id')->unsigned();
            $table->boolean('is_published')->default(true);

            $table->foreign('category_id')->references('id')->on('category_by_reviews')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('group_by_review_translations', function(Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('group_by_review_id');
            $table->string('name');
            $table->string('locale')->index();

            $table->unique(['group_by_review_id', 'locale']);

            $table->foreign('group_by_review_id')
                ->references('id')
                ->on('group_by_reviews')
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
        Schema::dropIfExists('group_by_review_translations');
        Schema::dropIfExists('group_by_reviews');
    }
}
