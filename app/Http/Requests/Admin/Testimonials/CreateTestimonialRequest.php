<?php

namespace App\Http\Requests\Admin\Testimonials;

use Illuminate\Foundation\Http\FormRequest;

class CreateTestimonialRequest extends FormRequest
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
            'description' => 'required|min:1|max:4294967295',
            'slug' => 'nullable|string|max:255',
            'published_date' => 'nullable',
            'status' => 'required|max:1'
        ];
    }

    /**
     * validation messages
    */
    public function messages()
    {
        return [
            'title.required' => 'title_required',
            'title.min' => 'title_too_short',
            'title.max' => 'title_too_long',
            'description.required' => 'description_required',
            'description.min' => 'description_too_short',
            'description.max' => 'description_too_long',
            'slug.string' => 'slug_should_be_a_string',
            'slug.max' => 'slug_too_long',
            'status.required' => 'status_required',

        ];
    }
}
