<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model\Comic;
use Faker\Generator as Faker;

$factory->define(Comic::class, function (Faker $faker) {
    return [
        'sku' => Str::random(10),
        'name' => $faker->name,
    ];
});
