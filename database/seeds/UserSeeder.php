<?php

use Illuminate\Database\Seeder;
use \App\Models\Region;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name' => 'User',
                'last_name' => 'Userov',
                'email' => 'user@gmail.com',
                'nickname' => 'blade',
                'city' => 'Denver',
                'region_id' => Region::where('slug', 'bryanskaya-oblast')->first()->id,
                'zip_code' => 12345,
                'is_admin' => 0,
                'email_verified_at' => date('Y-m-d H:i:s'),
                'password' => bcrypt('123321123'),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Ivan',
                'last_name' => 'Pushkin',
                'email' => '22121994y@gmail.com',
                'nickname' => 'ivanNickname',
                'city' => 'New York',
                'region_id' => Region::where('slug', 'bryanskaya-oblast')->first()->id,
                'zip_code' => 12345,
                'is_admin' => 0,
                'email_verified_at' => date('Y-m-d H:i:s'),
                'password' => bcrypt('123321123'),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Petr',
                'last_name' => 'Petrov',
                'email' => 'petr@gmail.com',
                'nickname' => '',
                'city' => 'Denver',
                'region_id' => Region::where('slug', 'bryanskaya-oblast')->first()->id,
                'zip_code' => 12345,
                'is_admin' => 0,
                'email_verified_at' => date('Y-m-d H:i:s'),
                'password' => bcrypt('123321123'),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Gosha',
                'last_name' => 'Goshev',
                'email' => 'gosha@gmail.com',
                'nickname' => 'blade',
                'city' => 'Denver',
                'region_id' => Region::where('slug', 'bryanskaya-oblast')->first()->id,
                'zip_code' => 12345,
                'is_admin' => 0,
                'email_verified_at' => date('Y-m-d H:i:s'),
                'password' => bcrypt('123321123'),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Admin',
                'last_name' => 'Adminov',
                'email' => 'devonics.en@gmail.com',
                'nickname' => 'devonicks',
                'city' => 'Denver',
                'region_id' => Region::where('slug', 'bryanskaya-oblast')->first()->id,
                'zip_code' => 12345,
                'is_admin' => 1,
                'email_verified_at' => date('Y-m-d H:i:s'),
                'password' => bcrypt('123321123'),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Admin',
                'last_name' => 'Adminenko',
                'email' => 'ars888@comcast.net',
                'nickname' => 'Admin',
                'city' => 'Denver',
                'region_id' => Region::where('slug', 'bryanskaya-oblast')->first()->id,
                'zip_code' => 12345,
                'is_admin' => 1,
                'email_verified_at' => date('Y-m-d H:i:s'),
                'password' => bcrypt('123321123'),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Pavel',
                'last_name' => 'Topuzliiev',
                'email' => 'topuzliiev@gmail.com',
                'nickname' => 'Pasho',
                'city' => 'Kharkiv',
                'region_id' => Region::where('slug', 'bryanskaya-oblast')->first()->id,
                'zip_code' => 61000,
                'is_admin' => 1,
                'email_verified_at' => date('Y-m-d H:i:s'),
                'password' => bcrypt('123321123'),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Rafael',
                'last_name' => 'Aviyants',
                'email' => 'rafaelsemailbox@mail.com',
                'nickname' => 'ARS',
                'city' => 'Manchester',
                'region_id' => Region::where('slug', 'bryanskaya-oblast')->first()->id,
                'zip_code' => 61000,
                'is_admin' => 0,
                'email_verified_at' => date('Y-m-d H:i:s'),
                'password' => bcrypt('123321123'),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]
        ];

        foreach($users as $user){
            User::firstOrCreate($user);
        }
    }
}
