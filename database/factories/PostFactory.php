<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\post;
use Faker\Generator as Faker;

$factory->define(post::class, function (Faker $faker) {
    return [
        'title' =>$faker->text(50),
        'body' =>$faker->text(200),
        'user_id'=>$faker ->numberBetween(1,10)
    ];
});
