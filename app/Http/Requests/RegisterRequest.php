<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:191',
            'email' => 'required|email|min:8|max:191|unique:users',
            'passoword' => 'required|min:8|max:191',
            'password_confirmation' => 'required|min:8|max:191'
        ];
    }
    public function messages()
    {
        return [
            'name.required' => '名前を入力してください。',
            'email.required' => 'メ ールアドレスを入力してください。',
            'email.email' => 'メールアドレスの形式で入力してください',
            'email.min' => 'メールアドレスは8文字以上で入力して下さい。',
            'email.max' => 'メールアドレスは191文字以内で入力して下さい。',
            'email.unique' => '入力のメールアドレスは既に登録済みです。',
            'password.required' => 'パスワードを入力してください。',
            'password.min' => 'パスワードは8文字以上で入力してください。',
            'password.max' => 'パスワードは191文字以内で入力してください。',
        ];
    }
}
