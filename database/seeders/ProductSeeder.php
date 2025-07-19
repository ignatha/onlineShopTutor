<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();

        $categoryIds = Category::pluck('id')->toArray();

        foreach (range(1, 50) as $i) {
            $name = $faker->words(3, true);

            Product::create([
                'category_id' => $faker->randomElement($categoryIds),
                'name' => ucfirst($name),
                'slug' => Str::slug($name) . '-' . $i,
                'description' => $faker->paragraph(),
                'price' => $faker->randomFloat(2, 10000, 1000000), // harga antara 10 ribu - 1 juta
                'stock' => $faker->numberBetween(0, 100),
                'image' => 'https://via.placeholder.com/300x300?text=Product+' . $i,
            ]);
        }
    }
}
