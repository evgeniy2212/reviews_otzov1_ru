<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBannersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banners', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('banner_category_id')->unsigned();
            $table->bigInteger('user_id')->unsigned();
            $table->string('src', 200);
            $table->string('name', 200)->default('');
            $table->string('original_name', 200)->default('');
            $table->string('title')->nullable();
            $table->string('alt', 100)->default('');
            $table->boolean('is_new')->default(false);
            $table->boolean('is_published')->default(false);
            $table->dateTime('from')->useCurrent();
            $table->dateTime('to')->useCurrent();
            $table->string('email')->default('');
            $table->string('locale')->index();

            $table->foreign('banner_category_id')->references('id')->on('banner_categories')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('banners');
    }
}
