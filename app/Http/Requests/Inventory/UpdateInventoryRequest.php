<?php

namespace App\Http\Requests\Inventory;

use Illuminate\Foundation\Http\FormRequest;

class UpdateInventoryRequest extends FormRequest
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
            'product_id' => ['sometimes', 'integer', 'exists:products,product_id'],
            'username' => ['sometimes', 'string', 'max:255'],
            'password_encrypted' => ['sometimes', 'string'],
            'extra_data_250kb' => ['sometimes', 'string', 'max:256000'], // Adjust if stored differently
        ];
    }
}
