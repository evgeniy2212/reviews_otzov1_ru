<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\UserCongratulation;
use Faker\Generator as Faker;

    $factory->define(UserCongratulation::class, function (Faker $faker) {
    $user = \App\Models\User::all()->random();
    $date = \Carbon\Carbon::create(2019, 5, 28, 0, 0, 0);
    $category_id = rand(1, 20);
    $locale = array_rand(app('laravellocalization')->getSupportedLocales(), 1);

    return [
        'user_id' => $user->id,
        'body' => $faker->realText(rand(100, 300)),
        'region_id' => \App\Models\Region::all()->first()->id,
        'city' => $faker->city,
        'congratulation_category_id' => $category_id,
        'name' => $faker->firstName,
        'second_name' => $faker->lastName,
        'user_sign' => rand(1, 3),
        'is_published' => rand(0, 1),
        'locale' => $locale,
        'created_at' => $date->addWeeks(rand(1, 52))->format('Y-m-d H:i:s')
    ];
});
