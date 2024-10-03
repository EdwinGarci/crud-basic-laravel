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
        Product::insert([
            [
                'name' => 'Producto 1',
                'description' => 'Descripción del Producto 1',
                'price' => 100.50,
                'stock' => 10,
            ],
            [
                'name' => 'Producto 2',
                'description' => 'Descripción del Producto 2',
                'price' => 200.75,
                'stock' => 5,
            ],
            [
                'name' => 'Producto 3',
                'description' => 'Descripción del Producto 3',
                'price' => 300.25,
                'stock' => 20,
            ],
        ]);
    }
}
