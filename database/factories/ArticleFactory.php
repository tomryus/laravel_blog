<?php

use Faker\Generator as Faker;

$factory->define(App\Model\Article::class, function (Faker $faker) {
    return [
        'title' => $faker->word,
        'picture' => $faker->word,
              
    ];
});
