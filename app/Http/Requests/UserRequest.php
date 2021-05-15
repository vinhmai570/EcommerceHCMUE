<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'name' => 'required',
            'phone' => 'nullable|min:10|max:11',
            'birthday'=> 'date|nullable',
            'address' => 'nullable|string',
            'image' => 'image|mimes:jpg,png,jpeg,gif,svg'
        ];
    }
}
