<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CheckTaskValidation extends FormRequest
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
    public function rules(){

        return [

            'category_name' => 'required',
         'subcategory_name' => 'required',
         'task_description' => 'required',

            'task_location' => 'required',
                //  'task_img' => 'required',
            //    'task_img.*' => 'mimes:jpeg,jpg,png,gif,csv,txt,pdf,JPEG,JPG,PNG,GIF,CSV,TXT,PDF|max:2048',

        ];

    }
    public function  messages()
    {
        return [

            'category_name.required' => 'Укажите название категори',
         'subcategory_name.required' => 'Укажите название подкатегории.',
         'task_description.required' => 'Требуется описание задачи',
        //    'task_starttime.required' => 'Укажите время начала задачи.',
        //   'task_finishtime.required' => 'Требуется время окончания задачи',
            'task_location.required' => 'Место задания обязательно',
                 'task_img.required' => 'Вам нужно скачать картинку',

        ];
    }
}
