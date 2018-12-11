<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \jiri\User::create([
            'name' => 'Cédric Müller',
            'email' => 'muller.cedric.96@gmail.com',
            'email_verified_at' => now(),
            'remember_token' => str_random(10),
            'is_admin' => true,
            'is_active' => true,
        ]);
        factory(jiri\User::class, 5)->create();
    }
}
