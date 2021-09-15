<?php

namespace App\Modules\Trip\Actions;

use App\Modules\Car\Repositories\CarRepositoryInterface;
use App\Modules\Trip\DTO\TripData;
use App\Modules\Trip\Models\Trip;
use Carbon\Carbon;

class TripCreateAction
{
    private $repository;

    public function __construct(CarRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function execute(TripData $data)
    {
        $this->repository->findOrFail($data->getCarId());

        return Trip::create([
            'car_id' => $data->getCarId(),
            'date'   => Carbon::parse($data->getDate()),
            'miles'  => $data->getMiles()
        ]);
    }
}
