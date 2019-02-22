<?php
use Faker\Generator as Faker;
$factory->define(App\Post::class, function (Faker $faker) {
    return [
        'title' => $faker->realText(rand(10, 20)),
        'category' => $faker->realText(rand(5, 10)),
        'body' => $faker->realText(rand(200, 6000)),
        'user_id' => function() {
            return \App\User::inRandomOrder()->first()->id;
        }
    ];
});
