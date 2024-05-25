<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('suppliers')->insert([
            [
                'name' => 'PT. Kikayu Global Sentosa',
                'phone' => '087888999777',
                'address' => 'Rukan New Castle Blok B-56 Jln. Greenlake City, Petir, Cipondoh Tangerang Kota, 15147 Ketapang, Cipondoh, Tangerang, Banten',
            ],
            [
                'name' => 'PT. Hitech Marwah Indonesia',
                'phone' => '081222333444',
                'address' => 'Citra Harmoni Blok A-09 Jalan Raya Trosobo Km.20 Taman - Sidoarjo Wage, Taman, Kab. Sidoarjo, Jawa Timur',
            ],
        ]);
    }
}
