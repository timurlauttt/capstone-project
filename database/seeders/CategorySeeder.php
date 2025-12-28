<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create two main categories requested by the user
        $categories = [
            [
                'name' => 'Kayu',
                'slug' => 'kayu',
            ],
            [
                'name' => 'Buah',
                'slug' => 'buah',
            ],
        ];

        foreach ($categories as $category) {
            // Use firstOrCreate to avoid duplication when re-running seeder
            Category::firstOrCreate(['slug' => $category['slug']], $category);
        }
    }
}
