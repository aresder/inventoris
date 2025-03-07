<?php

namespace App\Http\Requests;

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
            'name' => 'sometimes|required',
            'category_id' => 'sometimes|required',
            'description' => 'sometimes|nullable',
            'price' => 'sometimes|required|numeric|min:0',
            'quantity' => 'sometimes|required|numeric|min:0',
        ];
    }
}
