<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProblemMessageRequest extends FormRequest
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
            'problem_description' => 'required|min:10',
        ];
    }
    public function  messages()
    {
        return [

            'problem_description.required' => 'Поля текста обязательно',
            // 'problem_description.min'=>'Поля текста должно быть не менее 10 символов'

        ];
    }
}
