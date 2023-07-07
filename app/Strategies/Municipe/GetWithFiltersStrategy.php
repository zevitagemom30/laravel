<?php

namespace App\Strategies\Municipe;

use App\Strategies\AbstractStrategy;
use App\Repositories\MunicipesRepository;
use App\Traits\PreventBehaviorsAsService;
use App\Validators\Municipe\GetWithFiltersValidator;
use App\Handlers\Municipe\GetWithFiltersHandler;

class GetWithFiltersStrategy extends AbstractStrategy
{
    use PreventBehaviorsAsService;

    public function __construct(
        GetWithFiltersValidator $validator,
        GetWithFiltersHandler $handler,
        MunicipesRepository $repository,
    )
    {
        $this->setDependencie('validator', $validator);
        $this->setDependencie('handler', $handler);
        $this->setDependencie('municipes_repository', $repository);
    }

    public function execute(array $data)
    {
        $formattedData = $this->handle($data, 'main');
        $data = $formattedData->toArray();

        $this->validate($data, 'main');

        $municipesRepository = $this->getDependencie('municipes_repository');
        return $municipesRepository->getWithFilters($data);
    }
}
