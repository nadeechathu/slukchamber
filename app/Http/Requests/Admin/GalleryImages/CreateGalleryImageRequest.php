<?php


namespace App\Http\Requests\Admin\GalleryImages;

use Illuminate\Foundation\Http\FormRequest;

class CreateGalleryImageRequest extends FormRequest
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
            'image_src' => 'nullable|max:65536',
            'alt_text' => 'nullable|max:255',
            'caption' => 'nullable|max:255',
        ];
    }

    public function messages()
    {
        return [
            'image_src.nullable' => 'image_src_required',
            'image_src.min' => 'image_src_too_short',
            'image_src.max' => 'image_src_too_long',

            'alt_text.max' => 'alt_text_too_long',

            'caption.max' => 'caption_too_long',

        ];
    }
}
