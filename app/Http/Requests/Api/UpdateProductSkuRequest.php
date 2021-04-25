<?php

namespace App\Http\Requests\Api;

use App\Http\Requests\Api\ApiRequest;

class UpdateProductSkuRequest extends ApiRequest
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
            'product_attributes.*' => 'required|integer',
            'image'                => 'mimes:jpg,gif,png',
            'sku'                  => 'required|string|min:3|max:12',
            'price'                => 'required|integer',
            'sale_price'           => 'required|integer',
            'quantity'             => 'required|integer'
        ];
    }
}
