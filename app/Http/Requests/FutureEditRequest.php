<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FutureEditRequest extends FormRequest
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
            'future_id'=>'required',
            'link'=>'required',
            'logo'=>'nullable|mimes:jpg,png,jpeg,svg|max:2048'
        ];
    }

    public function messages()
    {
        return[

            'logo.required'=>'Enter the logo',
            'logo.mimes' =>'Only logo in jpg, png, jpeg, svg format can be uploaded',
            'logo.max' => 'Reduce logo size',
        ];

    }
}
