<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewsForm extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|max:255',
            'body' => 'required',
            'image' => 'nullable|max:255|active_url'
        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'title.required' => 'Необходимо указать заголовок',
            'title.max' => 'Заголовок не должен превышать 255 символов',
            'body.required'  => 'Необходимо написать статью',
            'image.max' => 'Ссылка на картинку не должна превышать 255 символов',
            'image.active_url' => 'Ссылка на картинку должна быть валидной',
        ];
    }
}
