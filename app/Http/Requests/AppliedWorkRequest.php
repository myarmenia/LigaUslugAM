<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AppliedWorkRequest extends FormRequest
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
                 'task_id' => 'required',
        'executor_user_id' => 'required',
           'category_name' => 'required',
        'subcategory_name' => 'required',
      'service_price_from' => 'required',
        'service_price_to' => 'required',
               'date_from' => 'required',
                 'date_to' => 'required',
                 'message' => 'required',

        ];
    }
    public function  messages(){
        return [
            'task_id.required' => 'Task id is required',
   'executor_user_id.required' => 'Executor user id is required',
      'category_name.required' => 'Category name is required',
   'subcategory_name.required' => 'Subcategory name is required',
 'service_price_from.required' => 'Service price from is required',
   'service_price_to.required' => 'Service price to is required',
          'date_from.required' => 'Date from is required',
            'date_to.required' => 'Date to is required',
            'message.required' => 'Message is required',

   ];
    }
}
