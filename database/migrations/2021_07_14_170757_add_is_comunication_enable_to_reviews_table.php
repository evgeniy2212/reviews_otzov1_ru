<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIsComunicationEnableToReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('reviews', function (Blueprint $table) {
            $table->boolean('is_communication_enable')
                ->default(true)
                ->after('is_published');
            $table->boolean('is_blocked')
                ->default(false)
                ->after('is_published');
//            $table->boolean('on_moderation')
//                ->default(false)
//                ->after('is_published');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('reviews', function (Blueprint $table) {
            $table->dropColumn('is_communication_enable');
//            $table->dropColumn('on_moderation');
            $table->dropColumn('is_blocked');
        });
    }
}
