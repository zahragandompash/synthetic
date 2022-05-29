<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OurTeamEditRequest extends FormRequest
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
            'team_id'=>'required',
            'name'=>'required',
            'link'=>'required',
            'role'=>'required',
            'avatar'=>'nullable|mimes:jpg,png,jpeg,svg|max:2048'
        ];
    }
    public function messages()
    {
        return [
            'name.required'=>'Enter the name',
            'link.required'=>'Enter the link',
            'role.required'=>'Enter the role',
            'avatar.mimes' =>'Only icons in jpg, png, jpeg, svg format can be uploaded',
            'avatar.max' => 'Reduce icon size',
        ];
    }
}
