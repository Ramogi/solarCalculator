<?php
use Faker\Generator as Faker;
$factory->define(App\Installer::class, function (Faker $faker) {
    return [
        'name' => $faker->Company,
        'email' => $faker->unique()->safeEmail,
        'location' => $faker->country,
    ];
});
