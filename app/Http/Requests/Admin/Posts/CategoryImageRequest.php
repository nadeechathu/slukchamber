<?php

namespace App\Http\Requests\Admin\Posts;

use Illuminate\Foundation\Http\FormRequest;

class CategoryImageRequest extends FormRequest
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
            'post_id' => 'required',
            'banner_image' => 'required|min:1|max:255',
            'type' => 'nullable',
            'status' => 'required|max:1'
        ];
    }

    /**
     * validation messages
     */
    public function messages()
    {
        return [
            'post_id.required' => 'post_id_required',

            'banner_image.required' => 'banner_image_required',
            'banner_image.min' => 'banner_image_too_short',
            'banner_image.max' => 'banner_image_too_long',

            'status.required' => 'status_required',

        ];
    }
}
