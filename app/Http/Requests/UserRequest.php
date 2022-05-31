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
            'name'=>'required',
            'email'=>'required|unique:users',
            'type'=>'required|in:user,admin',

        ];
    }
    public function messages(){
        return[
            'name.required'=>'Enter the name',
            'email.required'=>'Enter the email',
            'email.unique'=>'Email is already registered',
            'type.required'=>'Select the type',
            'type.in'=>'Only user and admin values can be selected',
        ];

    }
}
