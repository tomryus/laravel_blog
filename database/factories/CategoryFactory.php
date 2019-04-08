<?php

use Faker\Generator as Faker;

$factory->define(App\Model\Category::class, function (Faker $faker) {
    return [
        'nama_category'=>$faker->unique()->name,
        'slug'=> Str::slug($faker->unique()->name, '-'),
    
        

    ];
});
