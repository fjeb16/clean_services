<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'name' => 'Limpieza única',
                'id_product' => 'price_1OOM1JKfuYCQVBMcroBfY8j3',
                'price' => 1
            ],
            [
                'name' => 'Suscripción Básica',
                'id_product' => 'price_1OOMnDKfuYCQVBMcJpMwJMsn',
                'price' => 1
            ]
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
