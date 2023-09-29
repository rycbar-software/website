<?php

namespace App\Http\Requests\Partner;

class StorePartnerRequest extends AbstractPartnerRequest
{
    protected function customRules(): array
    {
        return [
            'name' => 'required|unique:partners|max:255',
            'slug' => 'required|unique:partners|max:255',
        ];
    }
}
