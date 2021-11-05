<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCongratulatablesToUserCongratulationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_congratulations', function (Blueprint $table) {
            $table->bigInteger('to', FALSE, TRUE)->nullable()->after('is_published');
            $table->bigInteger('deleted_by_to', FALSE, TRUE)->nullable()->after('is_published');
            $table->bigInteger('deleted_by_from', FALSE, TRUE)->nullable()->after('is_published');
            $table->boolean('is_private')->default(false)->after('is_published');
            $table->boolean('is_read')->default(false)->after('is_published');

            $table->foreign('to')->references('id')->on('users');
            $table->foreign('deleted_by_to')->references('id')->on('users');
            $table->foreign('deleted_by_from')->references('id')->on('users');
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
            $table->dropForeign(['to']);
            $table->dropForeign(['deleted_by_from']);
            $table->dropForeign(['deleted_by_to']);
            $table->dropColumn('to', 'is_private', 'is_read', 'deleted_by_from', 'deleted_by_to');
        });
    }
}
