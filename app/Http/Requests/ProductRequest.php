<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'name' => 'required',
            'category_id' => 'required',
            'description' => 'nullable',
            'price' => 'required|numeric|min:0|max:2000000000',
            'quantity' => 'required|numeric|min:0|max:2000000000',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Input name tidak boleh kosong.',
            'category_id.required' => 'Input category tidak boleh kosong.',
            'price.required' => 'Input price tidak boleh kosong.',
            'price.numeric' => 'Input price harus berupa angka.',
            'price.min' => 'Input price tidak boleh angka minus (-).',
            'price.max' => 'Batas maximum 2.000.000.000',
            'quantity.required' => 'Input quantity tidak boleh kosong.',
            'quantity.numeric' => 'Input quantity harus berupa angka.',
            'quantity.min' => 'Input quantity tidak boleh angka minus (-).',
            'quantity.max' => 'Batas maximum 2.000.000.000',
        ];
    }
}
