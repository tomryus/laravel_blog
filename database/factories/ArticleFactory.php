<?php

use Faker\Generator as Faker;
use App\Model\Category;
use Illuminate\Support\Str;

$factory->define(App\Model\Article::class, function (Faker $faker) {
    return [
        'title' => str_slug($faker->name,'-'),
        'picture' => $faker->word,
        'body' => $faker->text,
        'id_category' =>function(){
           return Category::all()->random();
        }
              
    ];
});
