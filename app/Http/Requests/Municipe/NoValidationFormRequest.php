<?php

namespace App\Http\Requests\Municipe;

use Illuminate\Foundation\Http\FormRequest;

class NoValidationFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'nome' => 'required|max:100',
            'data_nascimento' => 'required|date_format:Y-m-d',
            'sexo_id' => 'required:integer',
            'nome_pai' => 'required|max:100',
            'nome_mae' => 'required|max:100',
            'nacionalidade_id' => 'required|integer',
            'tipo_logradouro_id' => 'required|integer',
            'nascimento_estado_id' => 'required|integer',
            'nascimento_municipio_id' => 'required|integer',
            'telefone_celular' => 'required',
            'nome_responsavel' => 'max:100',
            'residencia_cep' => 'required',
            'residencia_logradouro' => 'required|max:100',
            'residencia_numero' => 'required|max:50',
            'residencia_bairro' => 'required|max:100',
        ];
    }
}
