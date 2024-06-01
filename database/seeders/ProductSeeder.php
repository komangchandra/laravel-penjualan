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
        Product::create([
            'product_name' => 'Kopi Bubuk Robusta',
            'category_id' => 1,
            'discount_id' => null,
            'price' => 12000,
            'price_discount' => 12000,
            'product_information' => 'Kopi robusta dengan cita rasa kuat dan pahit, memiliki aroma khas dan kandungan kafein tinggi, cocok untuk penikmat sejati.',
            'image' => "null"
        ]);

        Product::create([
            'product_name' => 'Kopi Bubuk Robusta',
            'category_id' => 2,
            'discount_id' => null,
            'price' => 15000,
            'price_discount' => 15000,
            'product_information' => 'null',
            'image' => "null"
        ]);

        Product::create([
            'product_name' => 'Kopi Bubuk Robusta',
            'category_id' => 3,
            'discount_id' => null,
            'price' => 20000,
            'price_discount' => 20000,
            'product_information' => 'null',
            'image' => "null"
        ]);

        Product::create([
            'product_name' => 'Kopi Bubuk Robusta',
            'category_id' => 4,
            'discount_id' => null,
            'price' => 25000,
            'price_discount' => 25000,
            'product_information' => 'null',
            'image' => "null"
        ]);
    }
}
