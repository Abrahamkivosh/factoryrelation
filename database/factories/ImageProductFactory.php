<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\ImageProduct;
use Faker\Generator as Faker;
use App\Model\Product;
$factory->define(ImageProduct::class, function (Faker $faker) {
    $filePath = storage_path('Products');
    if(!File::exists($filePath)){
        File::makeDirectory($filePath);  //follow the declaration to see the complete signature
    }
    return [
        'product_id'=>function(){ return Product::all()->random(); },
        'file' => $faker->image($filePath , 200, 200),
        'description'=>$faker->realText(100,2),
        'size'=>$faker->numberBetween(1000,2000)

    ];
});
