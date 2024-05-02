<?php

namespace App\Http\Requests\Admin\Roles;

use Illuminate\Foundation\Http\FormRequest;

class CreateRoleRequest extends FormRequest
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
            'guard_name' => 'required|min:1|max:255',
            'role_permissions' => 'required|array'
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

            'guard_name.required' => 'guard_name_required',
            'guard_name.min' => 'guard_name_too_short',
            'guard_name.max' => 'guard_name_too_long',

            'role_permissions.required' => 'Permissions required for the role',
            'role_permissions.array' => 'Invalid permissions type'

        ];
    }
}
