<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CurrencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('currencies')->insert([
            'currency' => 'MXN',
            'currency_name' => 'Peso Mexicano',
        ]);

        DB::table('currencies')->insert([
            'currency' => 'CAD',
            'currency_name' => 'Dolar Canadiense',
        ]);

        DB::table('currencies')->insert([
            'currency' => 'USD',
            'currency_name' => 'Dolar Estadounidense',
        ]);
    }
}
