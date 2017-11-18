<?php

use App\User;
use App\Client;
use Faker\Generator as Faker;

$factory->define(Client::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'location' => $faker->address,
        'user_id' => function () {
            return factory(User::class)->create()->id;
        },
    ];
});
