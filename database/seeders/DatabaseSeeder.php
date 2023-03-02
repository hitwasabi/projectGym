<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        User::factory()->create(
            [
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'isAdmin' => true,
                'level' => 0,
                'phone' => '0123456789',
                'password' => Hash::make('admin'),
            ]
        );

        User::factory()->create(
            [
                'name' => 'admin1',
                'email' => 'admin1@gmail.com',
                'isAdmin' => true,
                'level' => 0,
                'phone' => '0123456789',
                'password' => Hash::make('admin'),
            ]
        );

        User::factory()->create(
            [
                'name' => 'PT',
                'email' => 'pt@gmail.com',
                'isAdmin' => false,
                'level' => 0,
                'phone' => '0123456789',
                'password' => Hash::make('pt'),
            ]
        );
    }
}
