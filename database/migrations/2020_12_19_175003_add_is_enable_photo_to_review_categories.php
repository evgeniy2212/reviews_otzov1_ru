<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIsEnablePhotoToReviewCategories extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('review_categories', function (Blueprint $table) {
            $table->boolean('is_enable_logo')->default(true)->after('enable_low_rating');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('review_categories', function (Blueprint $table) {
            $table->dropColumn(['is_enable_logo']);
        });
    }
}
