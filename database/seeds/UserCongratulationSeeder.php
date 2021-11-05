<?php

use Illuminate\Database\Seeder;

class UserCongratulationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       factory(\App\Models\UserCongratulation::class, 100)->create();
    }
}
