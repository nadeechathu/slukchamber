<?php

namespace App\Http\Requests\Admin\Components;

use Illuminate\Foundation\Http\FormRequest;

class CreateComponentRequest extends FormRequest
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
            'status' => 'required|max:1',
            'component_name_id' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'name_required',
            'name.min' => 'name_too_short',
            'name.max' => 'name_too_long',

            'status.required' => 'status_required',

        ];
    }
}
