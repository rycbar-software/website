<?php

namespace Database\Factories;

use App\Enum\ArticleStatusEnum;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = $this->faker->streetName . ' dev notes';
        $createdAt = $this->faker->dateTimeBetween(strtotime('2 years ago'), time() - 60);
        $text = '';
        for ($i = 0; $i < 6; $i ++) {
            $paragraph = $this->faker->text(800);
            $text .= '<p>' . $paragraph . '</p>';
        }
        $previewText = '';
        foreach ($this->faker->paragraphs(3) as $paragraph) {
            $previewText .= '<p>' . $paragraph . '</p>';
        }
        return [
            'name' => $name,
            'slug' => Str::slug($name),
            'created_at' => $createdAt,
            'updated_at' => $this->faker->dateTimeBetween($createdAt, time()),
            'text' => $text,
            'preview_text' => $previewText,
        ];
    }

    public function published(): Factory
    {
        return $this->state(function (array $attributes) {
            return [
                'status' => ArticleStatusEnum::PUBLISHED->value
            ];
        });
    }
}
