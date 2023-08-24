<?php

namespace App\Http\Requests;

use App\Models\Product;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UpdateProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::user()->isAdmin();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        $product = Product::find($this->get('id'));
        return [
            'name' => [
                'string',
                'required',
                'max:255',
                Rule::unique('products')->ignore($product)
            ],
            'slug' => [
                'string',
                'required',
                'max:255',
                Rule::unique('products')->ignore($product)
            ],
            'url' => 'string|nullable|max:255',
            'description' => ''
        ];
    }
}
