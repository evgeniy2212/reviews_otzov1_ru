<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContentImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('content_images', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('content_type')->nullable();
            $table->bigInteger('content_id')->unsigned()->nullable();
            $table->string('src', 200);
            $table->string('name', 200)->default('');
            $table->string('original_name', 200)->default('');
            $table->string('alt', 100)->default('');
            $table->boolean('is_main')->default(true);
            $table->boolean('is_new')->default(false);

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
        Schema::dropIfExists('content_images');
    }
}
