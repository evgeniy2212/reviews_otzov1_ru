<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('parent_id')->index()->nullable();
            $table->bigInteger('user_id')->index()->unsigned();
            $table->bigInteger('review_id')->index()->unsigned();
            $table->text('body');
            $table->integer('likes')->default(0);
            $table->integer('dislikes')->default(0);
            $table->boolean('is_published')->default(true);
            $table->string('user_sign')->nullable();

            $table->foreign('review_id')->references('id')->on('reviews')->onDelete('cascade');
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
        Schema::dropIfExists('comments');
    }
}
