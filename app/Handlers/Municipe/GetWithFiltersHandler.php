<?php

namespace App\Handlers\Municipe;

use App\Handlers\AbstractHandler;

class GetWithFiltersHandler extends AbstractHandler
{
    public function main(array $data)
    {
        $keys = ['cpf_numero', 'codigo_cns', 'nome'];

        foreach ($keys as $key) {
            $value = (isset($data[$key])) ? trim($data[$key]) : '';
            if (empty($value)) {
                $data[$key] = null;
            }
        }

        if (!empty($data['codigo_cns']) && is_numeric($data['codigo_cns'])) {
            $data['codigo_cns'] = (int) $data['codigo_cns'];
        }

        $data['registro_principal'] = (isset($data['registro_principal'])) 
            ? (bool) $data['registro_principal'] 
            : null;

        return $data;
    }
}
