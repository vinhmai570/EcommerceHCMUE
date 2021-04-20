<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
            'product.name'               => 'required|min:3|max:255|unique:products,name,' .$this->id,
            'product.description'        => 'required|min:3',
            'product.content'            => 'required|min:3',
            'product.category_id'        => 'integer',
            'product.quantity'           => 'required|integer'
        ];
    }
}
