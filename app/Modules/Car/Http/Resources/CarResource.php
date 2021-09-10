<?php

namespace App\Modules\Car\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CarResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->resource->id,
            'make' => $this->resource->make,
            'model' => $this->resource->model,
            'year' => $this->resource->year

            // handle it add later
            //'trip_count' => null,
            //'trip_miles' => 1,
        ];
    }
}
