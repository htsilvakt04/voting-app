<?php


$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});


$factory->define(App\CommunityLink::class, function (Faker\Generator $faker) {

    return [
        'user_id' => 1,
        'title' => $faker->sentence,
        'link' => $faker->url,
        'channel_id' => 1,
        'approved' => 0,
    ];
});
