<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIsBlockedToUserCongratulationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_congratulations', function (Blueprint $table) {
            $table->boolean('is_blocked')
                ->default(false)
                ->after('is_published');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_congratulations', function (Blueprint $table) {
            $this->dropColumn('is_blocked');
        });
    }
}
