<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReitingRequest extends FormRequest
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
        // we get 3 property  from the postman
        return [

            'task_id' => 'required',
             'rating' => 'required',
            'content' => 'required'

        ];
    }
    public function  messages(){
        return [
              'task_id.required' => 'task_id is required',
               'rating.required' => 'rating is required',
              'content.required' => 'content is required',

        ];
    }
}
