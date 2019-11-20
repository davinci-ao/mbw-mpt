<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Chalet;
use Faker\Generator as Faker;

$factory->define(Chalet::class, function (Faker $faker) {
    return [
            'name' => $faker->word,
            'description' => $faker->sentence($nbWords = 100, $variableNbWords = false),
            'price' => $faker->numberBetween($min = 1, $max = 3),
            'country' => $faker->word,
            'housenr' => $faker->numberBetween($min = 1, $max = 3),
            'addition' => $faker->word,
            'street' => $faker->word,
            'place' => $faker->word,
            'longitude' => $faker->numberBetween($min = 1, $max = 21),
            'latitude' => $faker->numberBetween($min = 1, $max = 21),
    ];
});
