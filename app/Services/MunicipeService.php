<?php

namespace App\Services;

use App\Services\AbstractService;
use App\Strategies\Municipe\GetWithFiltersStrategy;

class MunicipeService extends AbstractService
{
    public function __construct(
        GetWithFiltersStrategy $getWithFiltersStrategy,
    )
    {
        $this->setDependencie('get_with_filters_strategy', $getWithFiltersStrategy);
    }

    public function getWithFilters(array $data)
    {
        $searchByCnsStrategy = $this->getDependencie('get_with_filters_strategy');

        $result = $searchByCnsStrategy->execute($data);

        return [
            'total' => $result->count(),
            'rows' => $result
        ];
    }
}
