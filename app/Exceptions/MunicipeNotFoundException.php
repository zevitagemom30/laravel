<?php

namespace App\Exceptions;

use App\Exceptions\ResourceNotFoundException;

class MunicipeNotFoundException extends ResourceNotFoundException
{
    protected $message = 'O munícipe não foi encontrado';
}
