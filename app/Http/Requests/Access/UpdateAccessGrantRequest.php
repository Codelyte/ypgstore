<?php

namespace App\Http\Requests\Access;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAccessGrantRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
         return [
            'payment_id' => ['sometimes', 'integer', 'exists:payments,id'],
            'inventory_id' => ['sometimes', 'integer', 'exists:inventory,id'],
            'granted_at' => ['nullable', 'date'],
        ];
    }
}
