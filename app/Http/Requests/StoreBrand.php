<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBrand extends FormRequest
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
            'brand_name'=>'required | min:5',
            'brand_description'=>'required | min:10',
            // 'url'=>''
        ];
    }

    public function messages()
    {
        return[
            'brand_name.required' => 'The name field is required.',
            'brand_description.required' => 'The description field is required.',
        ];
    }
}
