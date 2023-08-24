<?php

namespace Database\Factories;

class ProductFactory extends AbstractDataFactory
{
    public function getType(): string
    {
        return 'Product';
    }

    protected function customDefinition(): array
    {
        return [
            'name' => $this->faker->colorName . ' product',
            'external_link' => $this->faker->url()
        ];
    }
}
