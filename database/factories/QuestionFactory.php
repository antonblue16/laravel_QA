<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\Qustion::class, function (Faker $faker) {
    return [
        'title' =>rtrim($faker->sentence(5, 10)),
        'body' => $faker->paragraph(rand(3,7), true),
        'views' =>rand(0, 10),
        //'answers_count' =>rand(0, 10),
        'votes' =>rand(-3, 10)
    ];
});