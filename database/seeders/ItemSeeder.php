<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;
use Str;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('items')->insert([
            [
                'photo'       => 'contoh1.jpg',
                'name'        => 'KURSI KANTOR HIGHPOINT - PRO 34',
                'slug'        => Str::slug('KURSI KANTOR HIGHPOINT - PRO 34'),
                'supplier_id' => 1,
                'user_id'     => 1,
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
                'stock'       => 150,
                'price'       => 40000,
            ],
        ]);
    }
}
