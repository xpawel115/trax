<?php

namespace App\Modules\Car\Http\Resources;

use App\Modules\Car\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Support\Collection;

class CarCollectionResource extends ResourceCollection
{
    /**
     * Transform the resource into an array.
     * @param Request $request
     * @return Collection
     */
    public function toArray($request): Collection
    {
        return $this->collection->transform(function (Car $car) {
            return [
                'id'    => $car->id,
                'make'  => $car->make,
                'model' => $car->model,
                'year'  => $car->year,
            ];
        });
    }
}
