<?php

namespace App\Http\Requests\Product;

use App\Domain\Product\ProductStoreDTO;
use App\Enum\StatusEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Enum;

abstract class AbstractProductRequest extends FormRequest
{
    public function authorize(): bool
    {
        return Auth::user()->isAdmin();
    }

    public function rules(): array
    {
        return array_merge(
            [
                'status' => [
                    'required',
                    new Enum(StatusEnum::class)
                ],
                'preview_picture' => 'image|nullable',
                'detail_picture' => 'image|nullable',
                'preview_text' => '',
                'detail_text' => '',
                'external_link' => 'string|nullable'
            ],
            $this->customRules()
        );
    }

    abstract protected function customRules(): array;

    public function getDTO(): ProductStoreDTO
    {
        return new ProductStoreDTO(
            StatusEnum::tryFrom($this->request->get('status')) ?: StatusEnum::DRAFT,
            $this->request->get('name') ?: '',
            $this->request->get('slug') ?: '',
            $this->request->get('preview_text') ?: '',
            $this->request->get('detail_text') ?: '',
            intval($this->request->get('sort') ?: 500),
            $this->request->get('external_link') ?: '',
            $this->hasFile('preview_picture') ? $this->file('preview_picture') : null,
            $this->hasFile('detail_picture') ? $this->file('detail_picture') : null,
        );
    }
}
