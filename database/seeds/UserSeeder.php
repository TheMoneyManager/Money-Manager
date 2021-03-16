<?php

use Illuminate\Database\Seeder;
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

        factory(User::class)->create([
            'email' => 'user@test.com',
            'role' => 'user',
        ]);

        factory(User::class)->create([
            'email' => 'admin@test.com',
            'role' => 'admin',
        ]);

        factory(User::class)->create([
            'email' => 'super@test.com',
            'role' => 'super',
        ]);

        factory(User::class, $count)->create();

    }
}
