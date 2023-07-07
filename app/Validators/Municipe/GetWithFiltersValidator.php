<?php

namespace App\Validators\Municipe;

use App\Validators\AbstractValidator;

class GetWithFiltersValidator extends AbstractValidator
{
    public function __construct()
    {
        $this->messages = array_merge($this->messages, [
            'codigo_cns_invalido' => 'O código CNS deve ser um inteiro maior que zero',
            'nome_invalido' => 'O nome deve possuir uma lista de caracteres válida',
            'cpf_numero_invalido' => 'O número de CPF deve possuir uma lista de caracteres válida',
            'registro_principal_invalido' => 'O filtro para registro principal deve ser verdadeiro ou falso',
        ]);
    }

    public function main()
    {
        $data = $this->getData();

        if (!is_null($data['codigo_cns'])) {
            if (!(is_int($data['codigo_cns']) && $data['codigo_cns'] > 0)) {
                $this->addError('codigo_cns_invalido');
            }
        }

        $stringKeys = ['cpf_numero', 'nome'];

        foreach ($stringKeys as $stringKey) {
            if (!is_null($data[$stringKey])) {
                if (!(is_string($data[$stringKey]) && strlen($data[$stringKey]) > 0)) {
                    $this->addError($stringKey . '_invalido');
                }
            }
        }

        if (isset($data['registro_principal']) && !is_bool($data['registro_principal'])) {
            $this->addError('registro_principal_invalido');
        }
    }
}
