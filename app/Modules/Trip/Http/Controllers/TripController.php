<?php

namespace App\Modules\Trip\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Trip\Actions\TripCreateAction;
use App\Modules\Trip\DTO\TripData;
use App\Modules\Trip\Http\Requests\CreateTripRequest;
use App\Modules\Trip\Http\Resources\TripCollectionResource;
use App\Modules\Trip\Http\Resources\TripResource;
use App\Modules\Trip\Repositories\TripRepositoryInterface;
use Illuminate\Http\Request;

class TripController extends Controller
{
    public function getTrips(TripRepositoryInterface $repository): TripCollectionResource
    {
        return new TripCollectionResource(
            $repository->getAll()
        );
    }

    public function create(CreateTripRequest $request, TripCreateAction $action): TripResource
    {
        return new TripResource(
            $action->execute(TripData::fromRequest($request))
        );
    }
}
