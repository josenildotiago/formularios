<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormularioRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'cnes' => 'required|string|max:191',
        ];
    }

    public function messages()
    {
        return [
            'cnes.required' => 'O campo CNES é obrigatório',
            'cnes.string' => 'O campo CNES deve ser somente texto',
            'cnes.string' => 'Máximo de 191 caracteres',
        ];
    }
}
