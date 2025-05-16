<?php

namespace App\Http\Requests\Inventory;

use Illuminate\Foundation\Http\FormRequest;

class InventoryRequest extends FormRequest
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
            'product_id' => 'required|exists:products,product_id',
            'username' => 'required|string|max:190',
            'password_encrypted' => 'required|string',
            'extra_data_250kb' => 'nullable|file|max:256', // 256KB max
        ];
    }
}
