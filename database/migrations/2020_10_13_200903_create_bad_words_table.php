<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBadWordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bad_words', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('review_category_id')->unsigned();
            $table->string('word');
            $table->string('locale')->index();

            $table->foreign('review_category_id')->references('id')->on('review_categories')->onDelete('cascade');
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
        Schema::dropIfExists('bad_word_translations');
        Schema::dropIfExists('bad_words');
    }
}
