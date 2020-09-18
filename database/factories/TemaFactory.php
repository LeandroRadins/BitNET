<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Tema;
use Faker\Generator as Faker;

$factory->define(Tema::class, function (Faker $faker) {
    return [
        'nombre' => $faker->unique()->word,
        'descripcion' => $faker->sentence(3),
    ];
});
