<?php

namespace App\Http\Controllers\V1\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MunicipeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
//        return [
//            'codigo_cns' => $this->codigo_cns
//        ];

        return $this->resource->toArray();
    }
}
