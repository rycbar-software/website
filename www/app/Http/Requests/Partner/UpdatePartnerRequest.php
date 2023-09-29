<?php

namespace App\Http\Requests\Partner;

use App\Models\Partner;
use Illuminate\Validation\Rule;

class UpdatePartnerRequest extends AbstractPartnerRequest
{
    protected function customRules(): array
    {
        $product = Partner::find($this->get('id'));
        return [
            'name' => [
                'required',
                'max:255',
                Rule::unique('partners')->ignore($product)
            ],
            'slug' => [
                'required',
                'max:255',
                Rule::unique('partners')->ignore($product)
            ],
        ];
    }
}
