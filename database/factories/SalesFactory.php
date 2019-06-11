<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Sales;
use Faker\Generator as Faker;

$factory->define(Sales::class, function (Faker $faker) {
    return [
        'user_id' => $faker->numberBetween($min = 1, $max = 15),
        'product' => $faker->word(),
        'price' => $faker->numberBetween($min = 100, $max = 200),

    ];
});
