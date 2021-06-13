<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewsRequest extends FormRequest
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
            'news_title' => 'required',
            'content' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'news_title.required' => 'Заголовок новости обязателен для запонения',
            'content.required' => 'Текст новости обязателен для заполнения'
        ];
    }
}
