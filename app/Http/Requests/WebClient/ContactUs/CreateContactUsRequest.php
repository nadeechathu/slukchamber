<?php

namespace App\Http\Requests\WebClient\ContactUs;

use Illuminate\Foundation\Http\FormRequest;

class CreateContactUsRequest extends FormRequest
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
            'full_name' => 'required|min:1|max:255',
            'inquiry_email' => 'email|required',
            'phone' => 'required|digits_between:10,12',
            'inquiry_subject' => 'required',
            'inquiry_message' => 'required|min:1|max:4294967295',
            'g-recaptcha-response' => 'required'

        ];
    }

    /**
     * validation messages
    */
    public function messages()
    {
        return [
            'full_name.required' => 'Full name is required',
            'inquiry_email.required' => 'Inquiry email is required',
            'phone.required' => 'Phone is required',
            'inquiry_email.email' => 'Invalid inquiry is email',
            'inquiry_message.email' => 'Inquiry message is required',
            'inquiry_subject.required' => 'Inquiry subject is required',
            'g-recaptcha-response.required" => "Please mark reCAPTCHA security checks and try again'

        ];
    }
}
