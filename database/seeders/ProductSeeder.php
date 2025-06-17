<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create(['title' => 'Товар A', 'price' => 1334]);
        Product::create(['title' => 'Товар B', 'price' => 334]);
        Product::create(['title' => 'Товар C', 'price' => 2345]);
    }
}
