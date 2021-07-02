<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BannerRequest extends FormRequest
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
            'image' => 'image|mimes:jpg,png,jpeg,gif,svg',
            'link' => 'nullable',
            'title' => 'required|string',
            'alt' => 'required|string|min:2|max:15',
            'content' => 'nullable|max:300'
        ];
    }
}
