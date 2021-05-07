<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Account;
use Faker\Generator as Faker;


$factory->define(Account::class, function (Faker $faker) {


    return [
        'name' => $faker->word(),
        'description' => $faker->paragraph(),
        'balance' => $faker->randomFloat(2, 100, 99999),
        'card_termination' => $faker->numerify('####'),
        'currency_id' => $faker->numberBetween(1, 3),
    ];
});
