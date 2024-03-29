<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(TaskTableSeeder::class );
        $this->call(ReviewTableSeeder::class);
        $this->call(ImageProductSeeder::class);

    }
}
