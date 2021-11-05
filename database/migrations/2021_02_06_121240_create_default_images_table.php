<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDefaultImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('default_images', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('src', 200);
            $table->string('name', 200)->default('');
            $table->string('original_name', 200)->default('');
            $table->string('locale')->nullable();
            $table->boolean('is_published')->default(true);

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
        Schema::dropIfExists('default_images');
    }
}
