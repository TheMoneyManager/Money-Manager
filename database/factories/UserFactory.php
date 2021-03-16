<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use App\Account;
use App\Category;
use App\Expense;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => Hash::make('asdf'),
        'remember_token' => Str::random(10),
        'role' => $faker->randomElement(['user', 'admin', 'super']),
    ];
});

$factory->afterCreating(User::class, function($user, $faker) {
    $accounts = intval(env('SEED_ACCOUNTS_PER_USER', 5));
    $categories = intval(env('SEED_CATEGORIES_PER_USER', 5));
    $expenses = intval(env('SEED_EXPENSES_PER_USER', 5));

    // accounts table entries
    for ($i = 1; $i <= $accounts; $i += 1) {
        $user->accounts()->save(factory(Account::class)->make());
    }

    // categories table entries
    for ($i = 1; $i <= $categories; $i += 1) {
        $user->accounts()->save(factory(Category::class)->make());
    }

    // expenses table entries
    for ($i = 1; $i <= $expenses; $i += 1) {
        $min_id = ($user->id -1) * $accounts + 1;
        $max_id = ($user->id) * $accounts;

        $user->accounts()->save(factory(Expense::class)->make([
            // Assigns the expense to a valid random account_id associated to the current user
            'account_id' => rand($min_id, $max_id),
        ]));
    }
});
