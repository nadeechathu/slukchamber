<?php


namespace App\Http\Requests\Admin\Pages;

use Illuminate\Foundation\Http\FormRequest;

class CreatePageRequest extends FormRequest
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
            'title' => 'required|min:1|max:255',
            'slug' => 'required|string|max:255',
            'meta_title' => 'nullable',
            'meta_description' => 'nullable',
            'canonical_url' => 'nullable',
            'keywords' => 'nullable',
            'status' => 'required|max:1'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'title_required',
            'title.min' => 'title_too_short',
            'title.max' => 'title_too_long',

            'slug.required' => 'slug_required',
            'slug.string' => 'slug_should_be_a_string',
            'slug.max' => 'slug_too_long',

            'status.required' => 'status_required',

        ];
    }
}
