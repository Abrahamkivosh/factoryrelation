<?php

use Illuminate\Database\Seeder;
use App\Model\Product;
use App\ImageProduct;
class ImageProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(ImageProduct::class,50)->create();
    }
}
