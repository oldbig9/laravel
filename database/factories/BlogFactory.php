<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Blog::class, function (Faker $faker) {
    return [
        'title' => $faker->text(128),
        'content' => $faker->text(1024),
        'user_id' => $faker->randomElement([1,2,3,4,5]),
        'category_id' => $faker->randomElement([1,2,3,4,5]),
    ];
});
