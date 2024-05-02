<?php

namespace App\Http\Requests\Admin\Configurations;

use Illuminate\Foundation\Http\FormRequest;

class CreateConfigurationRequest extends FormRequest
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
            'configuration_key' => 'required|min:1|max:255',
            'configuration_value' => 'nullable|min:1|max:255'
        ];
    }

    /**
     * validation messages
     */
    public function messages()
    {
        return [
            'configuration_key.required' => 'Configuration key required',
            'configuration_key.min' => 'Configuration key minimum length is 1',
            'configuration_key.max' => 'Configuration key maximum length is 255',

            'configuration_value.min' => 'Configuration value minimum length is 1',
            'configuration_value.max' => 'Configuration value maximum length is 255',

        ];
    }
}
