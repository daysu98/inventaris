<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        $this->call([
            RoleSeeder::class,
        ]);

        \App\Models\User::factory()->create([
            'role_id'  => 1,
            'name'     => 'Admin ' . config('app.name'),
            'email'    => 'admin@example.com',
            'password' => Hash::make('laravel1'),
        ]);
    }
}
