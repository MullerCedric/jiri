<?php

use Faker\Generator as Faker;

$factory->define(jiri\Examination::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence(3),
        'manager_id' => rand(1, 5),
        'start_time' => $faker->dateTimeBetween('- 6 months', '2 years'),
        'is_draft' => (bool)random_int(0, 1),
    ];
});
