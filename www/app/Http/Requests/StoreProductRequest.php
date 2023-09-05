<?php

namespace App\Http\Requests;

use App\Enum\StatusEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Enum;

class StoreProductRequest extends FormRequest
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
        return [
            'status' => [new Enum(StatusEnum::class)],
            'name' => 'required|unique:products|max:255',
            'slug' => 'required|unique:products|max:255',
            'preview_text' => '',
            'detail_text' => '',
            'external_link' => 'string|nullable'
        ];
    }
}
