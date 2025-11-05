<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert([
            [
                'name' => 'Sepatu',
                'description' => 'Barang Impor',
                'price' => 5000000,
                'stock' => 1000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Tas',
                'description' => 'Branded',
                'price' => 10000000,
                'stock' => 1000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Kalung',
                'description' => 'Kalung permata',
                'price' => 100,
                'stock' => 5000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
