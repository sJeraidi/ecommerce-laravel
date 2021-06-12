<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProduct extends FormRequest
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
            'product_name'=>'required | min:5 || max:50',
            'image' =>'required |mimes:jpeg,png,jpg',
            // 'category_id'=>'required',
            // 'brand_id'=>'required',
            'description'=>'required | min:10',
            'product_price'=>'required',
            'quantity'=>'required'
        ];
    }
}
