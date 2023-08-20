<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = $this->faker->colorName . ' product';
        $description = '';
        for ($i = 0; $i < 6; $i ++) {
            $paragraph = $this->faker->text(800);
            $description .= '<p>' . $paragraph . '</p>';
        }
        return [
            'name' => $name,
            'slug' => Str::slug($name),
            'url' => $this->faker->url(),
            'description' => $description
        ];
    }
}
