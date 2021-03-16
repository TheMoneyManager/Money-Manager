<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $count = 20;            // +3 users

        DB::table('users')->insert([
            'name' => 'John Doe',
            'email' => 'user@test.com',
            'email_verified_at' => now(),
            'password' => Hash::make('asdf'),
            'remember_token' => Str::random(10),
            'role' => 'user',
        ]);

        DB::table('users')->insert([
            'name' => 'Zane Stroman',
            'email' => 'admin@test.com',
            'email_verified_at' => now(),
            'password' => Hash::make('asdf'),
            'remember_token' => Str::random(10),
            'role' => 'admin',
        ]);

        DB::table('users')->insert([
            'name' => 'Rachel Zulauf',
            'email' => 'super@test.com',
            'email_verified_at' => now(),
            'password' => Hash::make('asdf'),
            'remember_token' => Str::random(10),
            'role' => 'super',
        ]);

        factory(User::class, $count)->create();

    }
}
