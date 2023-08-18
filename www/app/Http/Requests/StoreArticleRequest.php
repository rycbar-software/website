<?php

namespace App\Http\Requests;

use App\Enum\ArticleStatusEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Enum;

class StoreArticleRequest extends FormRequest
{
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
            'status' => [new Enum(ArticleStatusEnum::class)],
            'title' => 'required|max:170',
            'name' => 'required|unique:articles|max:255',
            'slug' => 'required|unique:articles|max:255',
            'preview_text' => '',
            'detail_text' => ''
        ];
    }
}
