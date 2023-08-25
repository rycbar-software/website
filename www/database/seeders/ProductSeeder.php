<?php

namespace Database\Seeders;

use App\Models\Product;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::truncate();

        $faker = Factory::create();

        $products = Product::factory()->count(2)->create();
        foreach ($products as $product) {
            $product->addMediaFromUrl($faker->imageUrl())->toMediaCollection('preview_picture');
        }
        $products = Product::factory()->count(2)->published()->create();
        foreach ($products as $product) {
            $product->addMediaFromUrl($faker->imageUrl())->toMediaCollection('preview_picture');
        }
    }
}
