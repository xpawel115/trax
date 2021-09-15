<?php

namespace App\Modules\Car\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Car\Actions\CreateCarAction;
use App\Modules\Car\Actions\DeleteCarAction;
use App\Modules\Car\DTO\CarData;
use App\Modules\Car\Http\Requests\CreateCarRequest;
use App\Modules\Car\Http\Resources\CarCollectionResource;
use App\Modules\Car\Http\Resources\CarResource;
use App\Modules\Car\Models\Car;
use App\Modules\Car\Repositories\CarRepositoryInterface;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CarController extends Controller
{
    public function getCars(CarRepositoryInterface $carRepository): CarCollectionResource
    {
        $this->authorize('getCars', Car::class);

        return new CarCollectionResource(
            $carRepository->getAll()
        );
    }

    public function show(Request $request, CarRepositoryInterface $carRepository): CarResource
    {
        $this->authorize('show', Car::class);

        return CarResource::make(
            $carRepository->findOrFail($request->id)
        )->withTripSummary();
    }

    public function create(CreateCarRequest $request, CreateCarAction $action): CarResource
    {
        $this->authorize('create', Car::class);

        return new CarResource(
            $action->execute(CarData::fromRequest($request))
        );
    }

    public function destroy(Request $request, CarRepositoryInterface $carRepository, DeleteCarAction $action)
    {
        $this->authorize('destroy', Car::class);

        $action->execute(
            $carRepository->findOrFail($request->id)
        );

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
