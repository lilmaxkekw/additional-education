<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReportCardRequest extends FormRequest
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
            'date_section' => 'required|date|date_format:Y-m-d'
        ];
    }

    public function messages()
    {
        return [
            'name_section.required' => 'Название раздела обязательно для заполения.',
            'description_section.required' => 'Описание раздела обязательно для заполнения.',
            'date_section.required' => 'Дата раздела обязательна для заполнения.',
            'date_section.date' => 'Дата раздела должна являтся датой.',
            'date_section.date_format' => 'Дата должна быть в формате dd.mm.yyyy.',
        ];
    }
}
