<?php

namespace App\Repositories;

use App\Repositories\AbstractRepositoryAsModel;
use App\Models\Municipes;
use App\Contracts\MunicipesRepositoryContract;

class MunicipesRepository extends AbstractRepositoryAsModel implements MunicipesRepositoryContract
{
    public function __construct()
    {
        parent::setModel(new Municipes());
    }

    public function getWithFilters(array $filters)
    {
        $query = parent::getModel();

        if (array_key_exists('nome', $filters) && !is_null($filters['nome'])) {
            $query = $query->where('nome', 'like', '%' . $filters['nome'] . '%');
        }
        if (array_key_exists('cpf_numero', $filters) && !is_null($filters['cpf_numero'])) {
            $query = $query->where('cpf_numero', '=', $filters['cpf_numero']);
        }
        if (array_key_exists('codigo_cns', $filters) && is_int($filters['codigo_cns'])) {
            $query = $query->where('codigo_cns', '=', $filters['codigo_cns']);
        }
        if (array_key_exists('registro_principal', $filters) && is_bool($filters['registro_principal'])) {
            $query = $query->where('registro_principal', '=', $filters['registro_principal']);
        }

        return $query->get();
    }
}
