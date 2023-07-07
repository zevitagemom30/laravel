<?php

namespace App\Http\Controllers\V1\Pages;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\MunicipeService;
use App\Http\Controllers\V1\Resources\MunicipeResource;

class MunicipeController extends Controller
{
    public function __construct(
        MunicipeService $service,
    )
    {
        parent::setService($service);
    }

    public function getWithFilters(Request $request)
    {
        return parent::execute(function () use ($request) {
            $result = parent::getService()->getWithFilters(
                [
                    'codigo_cns' => $request->query('codigo_cns'),
                    'cpf_numero' => $request->query('cpf_numero'),
                    'nome' => $request->query('nome'),
                    'registro_principal' => $request->query('registro_principal')
                ]
            );

            if (isset($result['rows'])) {
                $result['rows'] = MunicipeResource::collection($result['rows']);
            }

            return $result;
        });
    }
}
