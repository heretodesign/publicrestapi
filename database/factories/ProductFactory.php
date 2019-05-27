<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'seller_name' => $faker->word,
        'weight' => $faker->numberBetween(1000,20000),
        'country_of_origin' => $faker->word,
        'harvesting_date' => $faker->randomDigit,
        'cultivar' => $faker->word,
    ];
});
