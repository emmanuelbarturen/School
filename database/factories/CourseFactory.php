<?php

use App\Course;
use Faker\Generator as Faker;

$factory->define(Course::class, function (Faker $faker) {
    return [
        'name' => $faker->unique()->word,
        'semester' => $faker->numberBetween(1, 6)
    ];
});
