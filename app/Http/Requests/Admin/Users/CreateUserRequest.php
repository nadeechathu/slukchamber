<?php

namespace App\Http\Requests\Admin\Users;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
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
            'name' => 'required|min:1|max:255',
            'email' => 'required|email|unique:users|min:1|max:255',
            'password' => 'required|string|max:255',
            'status' => 'required|max:1',
            'role' => 'required|string',
            'image' => 'nullable|file'
        ];
    }

        /**
         * validation messages
         */
        public function messages()
    {
        return [
            'name.required' => 'name_required',
            'name.min' => 'name_too_short',
            'name.max' => 'name_too_long',

            'email.required' => 'email_required',
            'email.email' => 'email_not_ina_valid_format',
            'email.min' => 'email_too_short',
            'email.max' => 'email_too_long',
            'email.unique' => 'email_already_exist',

            'password.required' => 'password_required',
            'password.string' => 'password_should_be_a_string',
            'password.max' => 'password_too_long',

            'status.required' => 'status_required',

            'role.required' => 'role_required',
            'role.string' => 'role_name_should_be_a_string',

        ];
    }
}
