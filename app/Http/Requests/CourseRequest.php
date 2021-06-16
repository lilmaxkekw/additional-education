<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CourseRequest extends FormRequest
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
            'name_of_course' => 'required',
            'description_of_course' => 'required',
            'image_of_course' => 'image|mimes:jpeg,png,jpg,svg|max:2048'
        ];
    }

    public function messages(){
        return [
            'name_of_course.required' => 'Название курса обязательно для заполнения',
            'description_of_course.required' => 'Описание курса обязательно для заполнения',
            'image_of_course.mimes' => 'Некорректный формат изображения'
        ];
    }
}
