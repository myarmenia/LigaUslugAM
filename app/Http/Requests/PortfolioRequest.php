<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PortfolioRequest extends FormRequest
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
        // return [
        //     "portfolio_pic" => 'required',
        //     "portfolio_link" => 'required|url',
        // //    "portfolio_pic.*" => 'mimes:jpeg,jpg,png|max:2048'
        // ];
    }

    public function  messages(){
        // return [
        //      "portfolio_pic.required" => "Portfolio picture is required",
        //     //    'rating.required' => 'rating is required',
        //     //   'portfolio_pic.required' => 'you cant',

        // ];
    }
}
