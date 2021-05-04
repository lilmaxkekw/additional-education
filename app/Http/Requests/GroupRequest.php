<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GroupRequest extends FormRequest
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
            'number_group' => 'required|numeric|unique:groups',
            'start_date' => 'required',
            'end_date' => 'required'
        ];
    }

    public function messages(){
        return [
            'number_group.required' => 'Номер группы обязателен для заполнения',
            'number_group.numeric' => 'Номер группы должен содержать только цифры',
            'number_group.unique' => 'Такая группа уже существует',
            'start_date.required' => 'Обязательно для заполнения',
            'end_date.required' => 'Обязательно для заполнения'
        ];
    }
}
