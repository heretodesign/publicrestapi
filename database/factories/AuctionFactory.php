<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Auction;
use Faker\Generator as Faker;

$factory->define(Auction::class, function (Faker $faker) {
    return [
    	'product_id' => function(){
    		return Product::all()->random();
    	},
        'price' => $faker->word,
        'start_date' => $faker->numberBetween(1000,20000),
        'duration' => $faker->numberBetween(1,30),
    ];
});
