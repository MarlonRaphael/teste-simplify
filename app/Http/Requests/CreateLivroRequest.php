<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateLivroRequest extends FormRequest
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
            'capa' => ['required', 'image', 'dimensions:min_width=100,min_height=200'],
            'titulo' => ['bail', 'required', 'string', 'min:6', 'max:255', 'unique:livros'],
            'autor' => ['bail', 'required', 'string', 'min:6', 'max:255'],
            'editora' => ['bail', 'required', 'string', 'min:6', 'max:255'],
            'idioma' => ['bail', 'required', 'string', 'min:6', 'max:255'],
            'edicao' => ['required', 'integer', 'min:0'],
            'ano' => ['required', 'integer', 'min:0'],
            'formato' => ['required', 'in:ebook,impresso'],
            'paginas' => ['required', 'integer', 'min:10'],
            'sinopse' => ['required', 'string', 'min:10']
        ];
    }
}
