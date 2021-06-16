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
//        regex:/^[А-ЯЁ][а-яё]{2,}([-][А-ЯЁ][а-яё]{2,})?\s[А-ЯЁ][а-яё]{2,}\s[А-ЯЁ][а-яё]{2,}$/
        return [
            'name' => "required",
            'email' => 'required|email',
            'number_phone' => 'regex:/^\+7\([0-9]{3}\)[0-9]{3}-[0-9]{2}-[0-9]{2}$/|min:16',
            'photo' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Поле ФИО обязательно для заполнения',
            'name.regex' => 'Некорректный формат ФИО',
            'email.required' => 'Поле эл. почты обязательно для заполнения',
            'email.email' => 'Некорректный формат почты',
            'number_phone.min' => 'Недостаточно символов в поле номера телефона',
            'number_phone.regex' => 'Неправильный формат телефона',
        ];
    }
}
