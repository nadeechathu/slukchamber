<?php

namespace App\Http\Requests\Admin\Users;

class UpdateUserRequest extends CreateUserRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'email' => 'required|email|min:1|max:255|unique:users,email,'.$this->id,
            'password' => 'nullable|string|max:255',
            'image' => 'nullable|file',
            'name' => 'nullable|string|max:255'
        ];
    }

        /**
         * validation messages
         */
        public function messages()
    {
        return [

            'email.required' => 'email_required',
            'email.email' => 'email_not_ina_valid_format',
            'email.min' => 'email_too_short',
            'email.max' => 'email_too_long',
            'email.unique' => 'email_already_exist',

            'password.string' => 'password_should_be_a_string',
            'password.max' => 'password_too_long',

            'status.required' => 'status_required',

        ];
    }
}
