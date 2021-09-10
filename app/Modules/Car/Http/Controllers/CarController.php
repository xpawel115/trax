<?php

namespace App\Modules\Car\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Car\Actions\CreateCarAction;
use App\Modules\Car\Actions\DeleteCarAction;
use App\Modules\Car\DTO\CarData;
use App\Modules\Car\Http\Requests\CreateCarRequest;
use App\Modules\Car\Http\Resources\CarCollectionResource;
use App\Modules\Car\Http\Resources\CarResource;
use App\Modules\Car\Repositories\CarRepositoryInterface;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CarController extends Controller
{
    public function getCars(CarRepositoryInterface $carRepository): CarCollectionResource
    {
        return new CarCollectionResource(
            $carRepository->getAll()
        );
    }

    public function show(Request $request, CarRepositoryInterface $carRepository): CarResource
    {
        return new CarResource(
            $carRepository->findOrFail($request->id)
        );
    }

    public function create(CreateCarRequest $request, CreateCarAction $action): CarResource
    {
        return new CarResource(
            $action->execute(CarData::fromRequest($request))
        );
    }

    public function destroy(Request $request, CarRepositoryInterface $carRepository, DeleteCarAction $action)
    {
        $action->execute(
            $carRepository->findOrFail($request->id)
        );

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
