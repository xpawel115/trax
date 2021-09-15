<?php

namespace App\Modules\Trip\Http\Resources;

use App\Modules\Car\Http\Resources\CarResource;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TripResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     * @param Request $request
     * @return array
     * @throws \Exception
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->resource->id,
            'date' => $this->resource->date,
            'miles' => $this->resource->miles,
            'total' => random_int(10 ,16),
            'car' => new CarResource($this->resource->car)
        ];
    }
}
