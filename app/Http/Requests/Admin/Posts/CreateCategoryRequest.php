<?php

namespace App\Http\Requests\Admin\Posts;

use Illuminate\Foundation\Http\FormRequest;

class CreateCategoryRequest extends FormRequest
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
            'short_description' => 'nullable|min:0|max:65536',
            'description' => 'nullable|min:0|max:65536',
            'slug' => 'required|string|min:1|max:255',
            'status' => 'required|max:1',
            'meta_title' => 'nullable|min:0|max:65536',
            'meta_description' => 'nullable|min:0|max:65536',
            'meta_keywords' => 'nullable|min:0|max:255',
            'canonical_url' => 'nullable|string|max:255',
            // 'type' => 'required|min:1'
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

            'short_description.max' => 'short_description_too_long',

            'description.max' => 'description_too_long',

            'slug.required' => 'slug_required',
            'slug.string' => 'slug_should_be_a_string',
            'slug.min' => 'slug_too_short',
            'slug.max' => 'slug_too_long',

            'status.required' => 'status_required',

            'meta_title.max' => 'meta_title_too_long',

            'meta_description.max' => 'meta_description_too_long',

            'meta_keywords.max' => 'meta_keywords_too_long',

            'canonical_url.max' => 'canonical_url_too_long',

            // 'type.required' => 'type_required',
            // 'type.min' => 'type_too_short',

        ];
    }
}
