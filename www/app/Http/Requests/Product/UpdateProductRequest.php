<?php

namespace App\Http\Requests\Product;

use App\Models\Product;
use Illuminate\Validation\Rule;

class UpdateProductRequest extends AbstractProductRequest
{
    protected function customRules(): array
    {
        $product = Product::find($this->get('id'));
        return [
            'name' => [
                'required',
                'max:255',
                Rule::unique('products')->ignore($product)
            ],
            'slug' => [
                'required',
                'max:255',
                Rule::unique('products')->ignore($product)
            ],
        ];
    }
}
