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
        // $this->call(UsersTableSeeder::class);
        //Factory(\App\Model\Category::class,20)->create();
        Factory(\App\Model\Article::class,100)->create();

    }
}
