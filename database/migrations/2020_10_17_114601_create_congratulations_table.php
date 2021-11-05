<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCongratulationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('congratulations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('src', 200);
            $table->string('name', 200)->default('');
            $table->string('original_name', 200)->default('');
            $table->string('alt', 100)->default('');

            $table->timestamps();
        });

        Schema::table('users', function (Blueprint $table) {
            $table->bigInteger('congratulation_id')->unsigned()->nullable();

            $table
                ->foreign('congratulation_id')
                ->references('id')
                ->on('congratulations');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['congratulation_id']);
            $table->dropColumn(['congratulation_id']);
        });
        Schema::dropIfExists('congratulations');
    }
}
