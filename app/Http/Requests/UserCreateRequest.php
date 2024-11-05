<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserCreateRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'username' => ['required|min:2|max:12'],
            'email' => ['required|min:5|max:40|unique:users|email'],
            'password' => ['required|alpha_num|Password::min(8)|max:20|confirmed'],
        ];
    }
}
