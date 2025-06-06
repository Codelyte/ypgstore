<?php

namespace App\Http\Requests\Order;

use Illuminate\Foundation\Http\FormRequest;

class UpdateOrderRequest extends FormRequest
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
            'user_id' => ['sometimes', 'exists:users,id'],
            'total_price' => ['sometimes', 'numeric', 'min:0'],
            'status' => ['sometimes', 'string', 'in:pending,processing,completed,cancelled'],
        ];
    }
}
