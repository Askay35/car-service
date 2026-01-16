<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CarModelResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'brand' => $this->brand,
            'name' => $this->name,
            'comfort_category' => $this->whenLoaded('comfortCategory', function () {
                return [
                    'id' => $this->comfortCategory->id,
                    'name' => $this->comfortCategory->name,
                    'level' => $this->comfortCategory->level,
                ];
            }),
        ];
    }
}

