<?php

use App\Student;
use Faker\Generator as Faker;

$factory->define(Student::class, function (Faker $faker) {
    return [
        'names' => $faker->name,
        'email' => $faker->unique()->email
    ];
});
