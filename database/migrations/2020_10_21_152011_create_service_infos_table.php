<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiceInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_infos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('name');

            $table->timestamps();
        });

        Schema::create('service_info_translations', function(Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('service_info_id');
            $table->text('value');
            $table->string('locale')->index();

            $table->unique(['service_info_id', 'locale']);

            $table->foreign('service_info_id')
                ->references('id')
                ->on('service_infos')
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
        Schema::dropIfExists('service_info_translations');
        Schema::dropIfExists('service_infos');
    }
}
