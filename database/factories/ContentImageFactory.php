<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

    $factory->define(\App\Models\UserCongratulation::class, function (Faker $faker) {
    $user = \App\Models\User::all()->random();
    $date = \Carbon\Carbon::create(2019, 5, 28, 0, 0, 0);
    $category_id = rand(1, 20);
    $contentTypes = [\App\Models\UserCongratulation::class];

    return [
        'content_type' => $contentTypes[0],
        'content_id' => $faker->realText(rand(100, 300)),
        'region_id' => \App\Models\Region::all()->random()->id,
        'city' => $faker->city,
        'congratulation_category_id' => $category_id,
        'name' => $faker->firstName,
        'second_name' => $faker->lastName,
        'user_sign' => rand(1, 3),
        'is_published' => true,
        'created_at' => $date->addWeeks(rand(1, 52))->format('Y-m-d H:i:s')
    ];
});
