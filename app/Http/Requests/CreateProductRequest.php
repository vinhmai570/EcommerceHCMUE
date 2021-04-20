<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateProductRequest extends FormRequest
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
        $rules = [
            'name'                 => 'required|min:3|max:255|unique:products,name,' .$this->id,
            'description'          => 'required|min:3',
            'content'              => 'required|min:3',
            'category_id'          => 'integer',
            'product_attributes.*' => 'required|integer',
            'image'                => 'required|mimes:jpg,gif,png',
            'sku'                  => 'required|string',
            'price'                => 'required|integer',
            'sale_price'           => 'required|integer',
            'quantity'             => 'required|integer'
        ];

        return $rules;
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'sku.required'        => 'Required',
            'price.required'      => 'Required',
            'sale_price.required' => 'Required',
            'quantity.required'   => 'Required',
        ];
    }
}
