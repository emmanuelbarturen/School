<?php

use App\Teacher;
use Faker\Generator as Faker;

$factory->define(Teacher::class, function (Faker $faker) {
    return [
        'names' => $faker->name,
        'phone' => $faker->unique()->phoneNumber
    ];
});
