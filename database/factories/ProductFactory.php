<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name'=>$faker->word,
        'detials' =>$faker->sentence,
        'price' =>$faker->numberBetween(100,50000),
        'discount'=>$faker->numberBetween(5,30),
        'stoke' =>$faker->randomDigit
    ];
});
