<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReviewFilterValuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('review_filter_values', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('slug');
            $table->bigInteger('filter_id')->unsigned();

            $table->foreign('filter_id')->references('id')->on('review_filters')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('review_filter_value_translations', function(Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('review_filter_value_id');
            $table->string('value');
            $table->string('locale')->index();

            $table->unique(['review_filter_value_id', 'locale'], 'rev_filter_val_loc');

            $table->foreign('review_filter_value_id', 'rev_filter_val')
                ->references('id')
                ->on('review_filter_values')
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
        Schema::dropIfExists('review_filter_value_translations');
        Schema::dropIfExists('review_filter_values');
    }
}
