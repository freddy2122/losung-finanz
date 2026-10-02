<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "contact.*"         => "required|min:5",
            "contact.name"      => "required|string",
            "contact.email"     => "required|email",
            "contact.subject"   => "required|string",
            "contact.message"   => "required|string",
        ];
    }
}
