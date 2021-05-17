<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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
            'fullname' => 'required',
            'phone' => 'required|min:10|max:11',
            'address' => 'required|string',
            'email' => 'required|email',
            'total' => 'required|numeric',
            'note' => 'nullable|max:100'
        ];
    }
}
