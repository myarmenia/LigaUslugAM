<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClickOnTaskRequest extends FormRequest
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
                'executor_profile_id' => 'required',
                 'service_price_from' => 'required',
                   'service_price_to' => 'required',
                               'cost' => 'required',
                     'startdate_from' => 'required',
                      'start_date_to' => 'required',
                  'offer_to_employer' => 'required',


       ];

    }
    public function  messages(){
        return [
               'task_id.required' => 'Task id is required',
   'executor_profile_id.required' => 'Executor profile id is required',
    'service_price_from.required' => 'Service price from is required',
      'subcategory_name.required' => 'Subcategory name is required',
    'service_price_from.required' => 'Service price from is required',
      'service_price_to.required' => 'Service price to is required',
                  'cost.required' => 'Cost is required',
        'startdate_from.required' => 'Startdate_from is required',
         'start_date_to.required' => 'start_date_to is required',
     'offer_to_employer.required' => 'Offer to employer is required'
   ];
    }
}
