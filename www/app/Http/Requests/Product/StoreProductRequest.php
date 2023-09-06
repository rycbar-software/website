<?php

namespace App\Http\Requests\Product;

class StoreProductRequest extends AbstractProductRequest
{
    protected function customRules(): array
    {
        return [
            'name' => 'required|unique:products|max:255',
            'slug' => 'required|unique:products|max:255',
        ];
    }
}
