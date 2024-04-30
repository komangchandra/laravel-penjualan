<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            'category_name' => '50 gram',
        ]);

        Category::create([
            'category_name' => '100 gram',
        ]);

        Category::create([
            'category_name' => '200 gram',
        ]);

        Category::create([
            'category_name' => '250 gram',
        ]);
    }
}
