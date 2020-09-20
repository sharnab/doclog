<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserinfoRequest extends FormRequest
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
            'fullname'              => 'required',
            'username'              => 'required|string|max:255|unique:users',
            'password'              => 'required|string|min:6',
            'password_confirmation' => 'min:6|same:password',
            'usertype'              => 'required',
        ];


        return $rules;

    }
}
