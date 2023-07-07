<?php

namespace App\Contracts;

interface MunicipesRepositoryContract
{
    public function getWithFilters(array $filters);
}
