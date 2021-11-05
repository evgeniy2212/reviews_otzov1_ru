<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserImportantDatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_important_dates', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id')->unsigned();
            $table->text('body')->nullable();
            $table->bigInteger('important_date_type_id')->unsigned()->nullable();
            $table->string('name');
            $table->string('second_name')->nullable();
            $table->timestamp('important_date_date')->nullable();
            $table->string('user_sign')->nullable();
            $table->boolean('is_published')->default(true);

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('important_date_type_id')->references('id')->on('user_important_date_types')->onDelete('cascade');

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
        Schema::dropIfExists('user_important_dates');
    }
}
