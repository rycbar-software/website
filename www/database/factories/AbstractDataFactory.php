<?php

namespace Database\Factories;


use App\Enum\StatusEnum;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */

abstract class AbstractDataFactory extends Factory
{
    abstract protected function getType(): string;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = $this->getType() . ' ' . $this->faker->streetName;
        $createdAt = $this->faker->dateTimeBetween('-2 years', '-60 minutes');
        $detailText = '';

        for ($i = 0; $i < 6; $i ++) {
            $paragraph = $this->faker->realText(800);
            $detailText .= '<p>' . $paragraph . '</p>';
        }
        $previewText = '';
        for ($i = 0; $i < 3; $i ++) {
            $paragraph = $this->faker->realText(200);
            $previewText .= '<p>' . $paragraph . '</p>';
        }

        return array_merge(
            [
                'name' => $name,
                'slug' => Str::slug($name),
                'sort' => $this->faker->numberBetween(100, 1000),
                'created_at' => $createdAt,
                'updated_at' => $this->faker->dateTimeBetween($createdAt),
                'preview_text' => $previewText,
                'detail_text' => $detailText,
            ],
            $this->customDefinition()
        );
    }

    protected function customDefinition(): array
    {
        return [];
    }

    public function published(): Factory
    {
        return $this->state(function (array $attributes) {
            return [
                'status' => StatusEnum::PUBLISHED->value
            ];
        });
    }
}
