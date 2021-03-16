<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Expense;
use Faker\Generator as Faker;

$factory->define(Expense::class, function (Faker $faker) {
    return [
        'amount' => $faker->randomFloat(2, 100, 9999),
        'description' => $faker->paragraph(),
    ];
});
