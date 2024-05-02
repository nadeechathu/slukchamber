<?php

namespace App\Http\Requests\Admin\DirectorBoards;

use Illuminate\Foundation\Http\FormRequest;

class CreateDirectorBoardRequest extends FormRequest
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
            'designation' => 'required|min:1|max:255',
            // 'email' => 'min:1|max:255',
            'description' => 'min:1|max:4294967295',
            'image' => 'required',
            'status' => 'required|max:1',
            // 'category_ids' => 'required'
        ];
    }

    /**
     * validation messages
    */
    public function messages()
    {
        return [
            'name.required' => 'name_required',
            'designation.required' => 'designation_required',
            'status.required' => 'status_required',
            'image.required' => 'image_required'

        ];
    }
}
