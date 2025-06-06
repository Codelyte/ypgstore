<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
            'title' => 'sometimes|string|max:160',
            'description' => 'sometimes|string',
            'price_ngn' => 'sometimes|integer|min:0',
            'is_active' => 'sometimes|in:true,false,1,0',
            'product_image' => 'sometimes|file|image|mimes:jpeg,png,jpg,webp|max:2048', // max: 2MB
        ];
    }
}
