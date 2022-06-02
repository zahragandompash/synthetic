<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectEditRequest extends FormRequest
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
            'project_id'=>'required',
            'title'=>'required',
            'description'=>'required',
            'icon'=>'nullable|mimes:jpg,png,jpeg,svg|max:2048',
            'images'=>'nullable|array',
            'images.*.'=>'mimes:jpg,png,jpeg,svg|max:2048'

        ];
    }
    public function messages()
    {
        return[
            'title.required'=>'Enter the title',
            'description.required'=>'Enter the description',
            'icon.mimes' =>'Only icon in jpg, png, jpeg, svg format can be uploaded',
            'icon.max' => 'Reduce icon size',
            'images.*.mimes' =>'Only images in jpg, png, jpeg, svg format can be uploaded',
            'images.*.max' => 'Reduce images size',
        ];
    }
}
