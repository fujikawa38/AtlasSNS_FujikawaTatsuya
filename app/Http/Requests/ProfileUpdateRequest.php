<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'username' => ['required', 'min:2', 'max:12'],
            'email' => ['email', 'min:5', 'max:40', Rule::unique(User::class)->ignore($this->user()->id)],
            'newPassword' => ['required', 'alpha_num', 'min:8', 'max:20', 'confirmed'],
            'bio' => ['max:150'],
            'iconImage' => ['image', 'mimes:jpg,png,bmp,gif,svg'],
        ];
    }

    public function messages()
    {
        return [
            'username.required' => '名前を入力してください',
            'email.min' => 'メールアドレスは5文字以上、40文字以内です',
            'email.unique' => 'メールアドレスはすでに使用中です',
        ];
    }
}
