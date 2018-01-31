<?php

namespace QUIZ\Http\Requests\API;

use QUIZ\Http\CommonTraits\CustomValidation;
use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{

    use CustomValidation;

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
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'password' => 'required|min:6|confirmed',
            'password_confirmation' => 'required|min:6',
            'email' => 'required|unique:users',
        ];
    }
}
