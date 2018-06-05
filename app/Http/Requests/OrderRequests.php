<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class OrderRequests extends FormRequest
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
            'prod_id'=>'required||max:255',
            'cust_id'=>'required||max:255',
            'qty'=>'required',

        ];
    }

    public function messages()
    {
        return [
            
            'prod_id.required'  => 'Product name is required',
            'qty.required' => 'Quantity Field is required',
        
        ];
        // 'cust_id.required'  => ' is required',
    }
}
