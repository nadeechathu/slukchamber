<?php

namespace App\Http\Requests\Admin\Elements;

use Illuminate\Foundation\Http\FormRequest;

class CreateElementRequest extends FormRequest
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
            'element_name' => 'required|min:1|max:255',
            'status' => 'required'
        ];
    }
}
