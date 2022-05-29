<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PartnerEditRequest extends FormRequest
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
            'partner_id'=>'required',
            'title'=>'required',
            'icon'=>'nullable|mimes:jpg,png,jpeg,svg|max:2048',
            'link'=>'required'
        ];
    }
    public function messages()
    {
        return[
            'title.required'=>'Enter the partner\'s name',
            'icon.mimes' =>'Only icons in jpg, png, jpeg, svg format can be uploaded',
            'icon.max' => 'Reduce icon size',
            'link.required'=>'Enter the partner\'s link',

        ];
    }
}
