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
        $categories = [
            [
                'name' => 'Pohon Pelindung',
                'slug' => 'pohon-pelindung',
            ],
            [
                'name' => 'Pohon Buah',
                'slug' => 'pohon-buah',
            ],
            [
                'name' => 'Tanaman Hias',
                'slug' => 'tanaman-hias',
            ],
            [
                'name' => 'Pohon Produktif',
                'slug' => 'pohon-produktif',
            ],
            [
                'name' => 'Tanaman Obat',
                'slug' => 'tanaman-obat',
            ],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
