<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'name' => 'required|max:50',
            'email' => 'required|max:50|unique:users,email',
            'password' => 'min:8|max:50|required',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Name field is required',
            'name.max' => 'Name is maxlength 50',
           
            // 'email.required' => 'Email field is required',
            // 'email.unique' => 'Email is already exist',

            'password.required' => 'Password field is required',
            'password.min' => 'Password minlength 8 ',
            'password.max' => 'Password maxlength 50 ',
        ];
    }
}
