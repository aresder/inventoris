<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'full_name' => 'required|string|max:100',
            'username' => 'required|string|max:100|unique:users,username',
            'password' => 'required|string|min:8|confirmed'
        ];
    }

    public function messages(): array
    {
        return [
            'full_name.required' => 'Input full name tidak boleh kosong.',
            'full_name.string' => 'Input full name harus bertipe string.',
            'full_name.max' => 'Karakter melebih batas maksimal (100).',
            'username.required' => 'Input username tidak boleh kosong.',
            'username.string' => 'Input username harus bertipe string.',
            'username.max' => 'Karakter melebih batas maksimal (100).',
            'username.unique' => 'Username sudah digunakan.',
            'password.required' => 'Input password tidak boleh kosong.',
            'password.min' => 'Password minimal 8 karakter.',
            'password.confirmed' => 'Password tidak cocok.'
        ];
    }
}
