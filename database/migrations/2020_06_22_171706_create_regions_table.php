<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('regions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('slug');
            $table->boolean('is_enable')->default(true);
            $table->bigInteger('country_id')->unsigned();
            $table->unique(['country_id', 'slug'], 'region_slug');
            $table->foreign('country_id')->references('id')->on('countries');
            $table->timestamps();
        });

        Schema::create('region_translations', function(Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('region_id');
            $table->string('region_naming')->default('region');
            $table->string('region');
            $table->string('locale')->index();

            $table->unique(['region_id', 'locale'], 'region_loc');

            $table->foreign('region_id', 'region_loc')
                ->references('id')
                ->on('regions')
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
        Schema::dropIfExists('region_translations');
        Schema::dropIfExists('regions');
    }
}
