<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReviewCharacteristicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('review_characteristics', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('review_category_id')->unsigned();
            $table->boolean('is_positive')->default(true);
            $table->boolean('is_published')->default(true);

            $table->foreign('review_category_id')->references('id')->on('review_categories')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('review_characteristic_translations', function(Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('review_characteristic_id');
            $table->string('name');
            $table->string('locale')->index();

            $table->unique(['review_characteristic_id', 'locale'], 'rev_char_trans_loc');

            $table->foreign('review_characteristic_id', 'rev_char')
                ->references('id')
                ->on('review_characteristics')
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
        Schema::dropIfExists('review_characteristic_translations');
        Schema::dropIfExists('review_characteristics');
    }
}
