<?php

namespace App\Modules\Car\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CarResource extends JsonResource
{
    /**
     * @var bool|mixed
     */
    private $withTripSummary = false;

    /**
     * Transform the resource into an array.
     * @param Request $request
     * @return array
     */
    public function toArray($request): array
    {
        $basicData = $this->getBasicData();

        return $this->withTripSummary
            ? array_merge($basicData, $this->getTripSummary())
            : $basicData;
    }

    public function withTripSummary(): CarResource
    {
        $this->withTripSummary = true;

        return $this;
    }

    private function getBasicData(): array
    {
        return [
            'id'    => $this->resource->id,
            'make'  => $this->resource->make,
            'model' => $this->resource->model,
            'year'  => $this->resource->year
        ];
    }

    private function getTripSummary(): array
    {
        return [
            'trip_count' => $this->resource->trips->count(),
            'trip_miles' => $this->resource->trips->sum('miles')
        ];
    }
}
