<?php

namespace App\Modules\Trip\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Resources\Json\ResourceCollection;

class TripCollectionResource extends ResourceCollection
{
    /**
     * Transform the resource into an array.
     * @param Request $request
     * @return AnonymousResourceCollection
     */
    public function toArray($request): AnonymousResourceCollection
    {
        return TripResource::collection($this->collection);
    }
}
