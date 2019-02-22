<?php
use Faker\Generator as Faker;
$factory->define(App\Installer::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'location' => $faker->realText(rand(5, 10)),
    ];
});
