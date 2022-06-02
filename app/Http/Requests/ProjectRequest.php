<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectRequest extends FormRequest
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
            'title'=>'required',
            'description'=>'required',
            'icon'=>'required|mimes:jpg,png,jpeg,svg|max:2048',
            'images'=>'required|array',
            'images.*.'=>'mimes:jpg,png,jpeg,svg|max:2048'

        ];
    }
    public function messages()
    {
        return[
            'title.required'=>'Enter the title',
            'description.required'=>'Enter the description',
            'icon.required'=>'Enter the icon',
            'icon.mimes' =>'Only icon in jpg, png, jpeg, svg format can be uploaded',
            'icon.max' => 'Reduce icon size',
            'images.required'=>'Enter the images',
            'images.*.mimes' =>'Only images in jpg, png, jpeg, svg format can be uploaded',
            'images.*.max' => 'Reduce images size',
        ];
    }
}
