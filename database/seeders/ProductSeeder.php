<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Find or create a farmer user to assign products to
        $user = User::where('role', 'farmer')->first();
        if (!$user) {
            $user = User::factory()->create([
                'name' => 'Seeder Farmer',
                'email' => 'farmer-seeder@example.com',
                'role' => 'farmer',
            ]);
        }

        // Map categories to items from the user's list
        $kayu = [
            'kayu balsa',
            'kayu jati',
            'kayu trembesit',
            'kayu albasia',
        ];

        $buah = [
            'buah matoa',
            'buah mengkudu',
            'buah mangga',
            'buah jambu citra',
            'buah sirsak',
            'buah nangka',
            'pete',
            'buah jambu',
            'buah durian',
            'buah gamelina',
            // additional slash-separated items provided by user
            'pule',
            'koti',
            'bambu kultur',
            'klengkeng',
            'cengkeh',
            'manggis',
            'alpukat',
        ];

        $categoryKayu = Category::firstOrCreate(['slug' => 'kayu'], ['name' => 'Kayu', 'slug' => 'kayu']);
        $categoryBuah = Category::firstOrCreate(['slug' => 'buah'], ['name' => 'Buah', 'slug' => 'buah']);

        // Helper to create a product if not exists
        $createProduct = function ($title, $category) use ($user) {
            $slug = Str::slug($title, '-');
            $exists = Product::where('slug', $slug)->first();
            if ($exists) return;

            Product::create([
                'user_id' => $user->id,
                'title' => ucfirst($title),
                'slug' => $slug,
                'category_id' => $category->id,
                'description' => 'Bibit ' . ucfirst($title) . ' tersedia dan siap tanam.',
                'price' => rand(10000, 200000),
                'unit' => 'batang',
                'stock' => rand(10, 200),
                'status' => 'available',
                'is_visible' => 1,
            ]);
        };

        foreach ($kayu as $item) {
            $createProduct($item, $categoryKayu);
        }

        foreach ($buah as $item) {
            $createProduct($item, $categoryBuah);
        }
    }
}
