<?php

use Illuminate\Database\Seeder;

class UserImportantDateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       factory(\App\Models\UserImportantDate::class, 20)->create();
    }
}
