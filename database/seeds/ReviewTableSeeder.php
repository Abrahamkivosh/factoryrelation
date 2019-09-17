<?php

use App\Model\Product;
use App\Model\Review ;
use Illuminate\Database\Seeder;

class ReviewTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        factory(Product::class,50)->create();
        factory(Review::class,300)->create();
    }
}
