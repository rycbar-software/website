<?php

namespace Database\Factories;

class PartnerFactory extends AbstractDataFactory
{
    public function getType(): string
    {
        return 'Partner';
    }

    protected function customDefinition(): array
    {
        return [
            'name' => $this->faker->company()
        ];
    }
}
