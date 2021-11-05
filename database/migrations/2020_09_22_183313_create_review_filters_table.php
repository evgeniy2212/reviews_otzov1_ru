<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReviewFiltersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('review_filters', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('slug');
            $table->bigInteger('review_category_id')->unsigned()->nullable()->default(null);

            $table->foreign('review_category_id')->references('id')->on('review_categories');
            $table->timestamps();
        });

        Schema::create('review_filter_translations', function(Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('review_filter_id');
            $table->string('name');
            $table->string('locale')->index();

            $table->unique(['review_filter_id', 'locale'], 'rev_filter_loc');

            $table->foreign('review_filter_id', 'rev_filter')
                ->references('id')
                ->on('review_filters')
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
        Schema::dropIfExists('review_filter_translations');
        Schema::dropIfExists('review_filters');
    }
}
