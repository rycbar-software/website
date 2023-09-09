<?php

namespace App\Http\Requests;

use App\Domain\Feedback\FeedbackCreateDTO;
use Illuminate\Foundation\Http\FormRequest;

class StoreFeedbackRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function getDTO(): FeedbackCreateDTO
    {
        return new FeedbackCreateDTO(
            $this->get('name'),
            $this->get('email'),
            $this->get('message')
        );
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'string|max:255|nullable',
            'email' => 'email|required',
            'message' => 'string|nullable'
        ];
    }
}
