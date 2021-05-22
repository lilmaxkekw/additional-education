<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EducatorRequest extends FormRequest
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
            'email' => 'required|email',
            'name' => 'required',
            'number_phone' => 'min:16'
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'Поле email обязательно для заполнения.',
            'email.email' => 'В поле почта должна быть указана настоящая почта.',
            'name.required' => 'Поле имя для обязательно для заполнения.',
            'number_phone.min' => 'В поле номера телефона должно быть не менее 16 символов.',
        ];
    }
}
