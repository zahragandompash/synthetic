<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AboutUsRequest extends FormRequest
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
            'description'=>'required',
            'title'=>'required',
            'icon'=>'required|mimes:jpg,png,jpeg,svg|max:2048',
        ];
    }
    public function messages()
    {
        return[
            'description.required'=>'Enter the description',
            'title.required'=>'Enter the title',
            'icon.required'=>'Enter the icon',
            'icon.mimes' =>'Only icons in jpg, png, jpeg, svg format can be uploaded',
            'icon.max' => 'Reduce icon size',

        ];
    }
}
