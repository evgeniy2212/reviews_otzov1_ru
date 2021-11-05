<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserImportantDateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_important_date_types', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('slug')->unique();
            $table->boolean('is_published')->default(true);

            $table->timestamps();
        });

        Schema::create('user_important_date_type_translations', function(Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_important_date_type_id');
            $table->string('title');
            $table->string('name')->nullable();
            $table->string('locale')->index();

            $table->unique(['user_important_date_type_id', 'locale'], 'user_imp_date_type_loc');

            $table->foreign('user_important_date_type_id', 'user_imp_date_type')
                ->references('id')
                ->on('user_important_date_types')
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
        Schema::dropIfExists('user_important_date_type_translations');
        Schema::dropIfExists('user_important_date_types');
    }
}
