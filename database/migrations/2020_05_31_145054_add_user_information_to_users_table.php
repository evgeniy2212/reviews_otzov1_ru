<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUserInformationToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('last_name')->after('name');
            $table->string('nickname')->nullable()->after('last_name');
            $table->string('city')->after('nickname');
            $table->string('state')->after('city');
            $table->integer('zip_code')->after('state');
            $table->boolean('is_admin')->default(0)->after('zip_code');
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
            $table->dropColumn('last_name');
            $table->dropColumn('nickname');
            $table->dropColumn('city');
            $table->dropColumn('state');
            $table->dropColumn('is_admin');
            $table->dropColumn('zip_code');
        });
    }
}
