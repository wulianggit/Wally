<?php

namespace App\Http\Requests;


class UserRequest extends Request
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
        $rules = [
            'name' => 'required|min:2|max:25',
            'username' => 'required|unique:users,username|min:5|max:50',
            'password' => 'required|min:6|confirmed',
            'email' => 'required|unique:users,email|email',
        ];

        return $rules;
    }

    
}
