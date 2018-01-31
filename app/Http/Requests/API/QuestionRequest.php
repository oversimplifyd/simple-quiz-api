<?php

namespace QUIZ\Http\Requests\API;

use QUIZ\Http\CommonTraits\CustomValidation;
use Illuminate\Foundation\Http\FormRequest;

class QuestionRequest extends FormRequest
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
            'count' => 'nullable|integer',
            'type' => 'nullable|integer',
        ];
    }
}
