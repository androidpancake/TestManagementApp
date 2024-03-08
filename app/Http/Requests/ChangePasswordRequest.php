<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChangePasswordRequest extends FormRequest
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
            'username' => 'required|exists:users,username',
            'password' => 'required',
            'new_password' => 'required',
            'confirm_password' => 'required|same:new_password'
        ];
    }

    public function messages()
    {
        return [
            'username.required' => 'Invalid Username or Password',
            'old_password.required' => 'Invalid Username or Password',
            'password.required' => 'Required to fill',
            'confirm_password.required' => 'Password not match'
        ];
    }
}
