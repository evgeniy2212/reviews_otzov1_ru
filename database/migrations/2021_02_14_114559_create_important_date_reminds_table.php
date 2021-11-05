<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImportantDateRemindsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('important_date_reminds', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamp('important_date_remind')->useCurrent();
            $table->bigInteger('important_date_id')->unsigned();

            $table->foreign('important_date_id')->references('id')->on('user_important_dates')->onDelete('cascade');

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
        Schema::dropIfExists('important_date_reminds');
    }
}
