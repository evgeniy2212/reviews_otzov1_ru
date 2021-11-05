<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserCongratulationCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_congratulation_categories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('slug')->unique();
            $table->boolean('is_published')->default(true);

            $table->timestamps();
        });

        Schema::create('user_congratulation_category_translations', function(Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_congratulation_category_id');
            $table->string('title');
            $table->string('name')->nullable();
            $table->string('locale')->index();

            $table->unique(['user_congratulation_category_id', 'locale'], 'user_congrat_cat_loc');

            $table->foreign('user_congratulation_category_id', 'user_congrat_cat')
                ->references('id')
                ->on('user_congratulation_categories')
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
        Schema::dropIfExists('user_congratulation_category_translations');
        Schema::dropIfExists('user_congratulation_categories');
    }
}
