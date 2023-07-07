<?php

namespace App\Traits;

use App\Traits\AvailabilityWithDependencie;
use App\Exceptions\ValidatorException;
use App\Validators\AbstractValidator;
use App\Handlers\AbstractHandler;

trait PreventBehaviorsAsService
{
    use AvailabilityWithDependencie;

    public function getValidator(): ?AbstractValidator
    {
        return $this->getDependencie('validator');
    }

    public function getHandler(): ?AbstractHandler
    {
        return $this->getDependencie('handler');
    }

    protected function handle(array $data, string $method)
    {
        if (empty($handler = $this->getHandler())) {
            return;
        }

        return $handler->handle($data, $method);
    }

    protected function validate(
        array $data,
        string $method,
        ?AbstractValidator $validator = null
    )
    {
        if (!($validator instanceof AbstractValidator)) {
            if (empty($validator = $this->getValidator())) {
                return null;
            }
        }

        $validator->setData($data);

        if ($validator->validate($method) === false) {
            throw ValidatorException::withErrors($validator->getErrors());
        }

        return true;
    }
}
