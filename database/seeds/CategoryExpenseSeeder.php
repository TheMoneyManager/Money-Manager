<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoryExpenseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = intval(env('SEED_USERS', 20)) + 3; // 3 are the forced users
        $accounts = intval(env('SEED_ACCOUNTS_PER_USER', 5));
        $categories = intval(env('SEED_CATEGORIES_PER_USER', 5));
        $expenses = intval(env('SEED_EXPENSES_PER_USER', 5));
        $bindings = intval(env('SEED_MAX_CATEGORIES_EXPENSES_BINDINGS', 3));


        for ($i = 1; $i <= $users; $i += 1) {
            $min_category_id = ($i -1) * $categories + 1;
            $max_category_id = ($i) * $categories;

            $min_expense_id = ($i -1) * $expenses + 1;
            $max_expense_id = ($i) * $expenses;

            for ($j = 1; $j <= rand(0, $bindings); $j += 1) {
                DB::table('categories_expenses')->insert([
                    'category_id' => rand($min_category_id, $max_category_id),
                    'expense_id' => rand($min_expense_id, $max_expense_id),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
