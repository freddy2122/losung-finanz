<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReviewFormRequest extends FormRequest
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
            "review.name"    => "required|string|min:2|max:150",
            "review.rating"  => "required|integer|min:1|max:5",
            "review.message" => "required|string|min:10|max:2000",
        ];
    }
}
