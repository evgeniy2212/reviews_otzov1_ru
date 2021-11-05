<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

    $factory->define(\App\Models\UserImportantDate::class, function (Faker $faker) {
    $user = \App\Models\User::all()->random();
    $date = \Carbon\Carbon::create(2019, 5, 28, 0, 0, 0);
    $type_id = rand(1, 20);
    $created_date = $date->addWeeks(rand(1, 52));
    $importantDate = $created_date->addWeeks(rand(1, 3));

    return [
        'user_id' => $user->id,
        'body' => $faker->realText(rand(100, 300)),
        'important_date_type_id' => $type_id,
        'name' => $faker->firstName,
        'second_name' => $faker->lastName,
        'user_sign' => rand(1, 3),
        'is_published' => rand(0, 1),
        'created_at' => $created_date->format('Y-m-d H:i:s'),
        'important_date_date' => $importantDate->format('Y-m-d H:i:s')
    ];
});
