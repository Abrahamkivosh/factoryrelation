<?php

use Illuminate\Database\Seeder;

class UsersTableSeederl extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // factory(App\User::class, 50)->create()->each(function ($user) {
        //     $user->posts()->save(factory(App\Post::class)->make());
        // });

        factory(App\User::class, 50)->create() ;
        factory(App\post::class, 10)->create() ;
        factory(App\Article::class, 30)->create() ;
    }
}
