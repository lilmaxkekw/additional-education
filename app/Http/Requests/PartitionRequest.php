<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PartitionRequest extends FormRequest
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
            'date_start' => 'required',
            'date_end' => 'required',
            'name' => 'required',
            'number_hours' => 'required|numeric'
        ];
    }

    public function messages(){
        return [
            'date_start.required' => 'Это поле обязательно для заполнения',
            'date_end.required' => 'Это поле обязательно для заполнения',
            'name.required' => 'Название обязательно для заполнения',
            'number_hours.required' => 'Кол-во часов обязательно для заполнения',
            'number_hours.numeric' => 'Кол-во часов должно быть числом'
        ];
    }
}
