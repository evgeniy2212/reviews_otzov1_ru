<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBannerCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banner_categories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('slug')->unique();
            $table->boolean('is_published')->default(true);

            $table->timestamps();
        });

        Schema::create('banner_category_translations', function(Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('banner_category_id');
            $table->string('title');
            $table->string('locale')->index();

            $table->unique(['banner_category_id', 'locale']);

            $table->foreign('banner_category_id')
                ->references('id')
                ->on('banner_categories')
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
        Schema::dropIfExists('banner_category_translations');
        Schema::dropIfExists('banner_categories');
    }
}
