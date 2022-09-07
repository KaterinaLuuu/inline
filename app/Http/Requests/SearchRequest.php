<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SearchRequest extends FormRequest
{
    public function rules()
    {
        return [
            'text' => 'required|min:3'
        ];
    }

    public function messages()
    {
        return [
            'text.required' => 'Пустое поле, невозможно найти',
            'text.min' => 'Минимальная длинная текста для поиска - 3.',
        ];
    }
}
