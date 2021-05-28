<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SectionRequest extends FormRequest
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
            'name_section' => 'required',
            'description_section' => 'required',
            'date_section' => 'required|date'
        ];
    }

    public function messages(){
        return [
            'name_section.required' => 'Название раздела обязательно для заполнения',
            'description_section.required' => 'Описание раздела обязательно для заполнения',
            'date_section.required' => 'Дата проведения обязательно для заполнения'
        ];
    }
}
