<?php

namespace App\Http\Requests;

use App\Enum\StatusEnum;
use App\Models\Partner;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Enum;

class UpdatePartnerRequest extends FormRequest
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
        $partner = Partner::find($this->get('id'));
        return [
            'status' => [
                'required',
                new Enum(StatusEnum::class)
            ],
            'name' => [
                'required',
                'max:255',
                Rule::unique('partners')->ignore($partner)
            ],
            'slug' => [
                'required',
                'max:255',
                Rule::unique('partners')->ignore($partner)
            ],
            'preview_text' => '',
            'detail_text' => ''
        ];
    }
}
