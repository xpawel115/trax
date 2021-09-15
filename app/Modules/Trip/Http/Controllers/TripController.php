<?php

namespace App\Modules\Trip\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Trip\Actions\TripCreateAction;
use App\Modules\Trip\DTO\TripData;
use App\Modules\Trip\Http\Requests\CreateTripRequest;
use App\Modules\Trip\Http\Resources\TripCollectionResource;
use App\Modules\Trip\Http\Resources\TripResource;
use App\Modules\Trip\Models\Trip;
use App\Modules\Trip\Repositories\TripRepositoryInterface;

class TripController extends Controller
{
    public function getTrips(TripRepositoryInterface $repository): TripCollectionResource
    {
        $this->authorize('getTrips', Trip::class);

        return new TripCollectionResource(
            $repository->getAll()
        );
    }

    public function create(CreateTripRequest $request, TripCreateAction $action): TripResource
    {
        $this->authorize('createTrip', Trip::class);

        return new TripResource(
            $action->execute(TripData::fromRequest($request))
        );
    }
}
