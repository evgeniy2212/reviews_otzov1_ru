<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPolymorphicToComplainsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('complains', function (Blueprint $table) {
            $table->string('model_type')
                ->after('id')
                ->default('App\\\Models\\\Review');
            $table->dropForeign(['review_id']);
            $table->renameColumn('review_id', 'model_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('complains', function (Blueprint $table) {
            $table->dropColumn('model_type');
            $table->renameColumn('model_id', 'review_id');
            $table->foreign('review_id')->references('id')->on('reviews')->onDelete('cascade');
        });
    }
}
