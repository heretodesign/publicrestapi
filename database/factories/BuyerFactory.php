<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Buyer;
use Faker\Generator as Faker;

$factory->define(Buyer::class, function (Faker $faker) {
    return [
    	'product_id' => function(){
    		return Product::all()->random();
    	},
        'name' => $faker->word,
        'bid_price' => $faker->numberBetween(1000,20000)
    ];
});
