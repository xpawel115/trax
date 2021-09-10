<?php

namespace App\Modules\Car\Actions;

use App\Modules\Car\DTO\CarData;
use App\Modules\Car\Models\Car;

class CreateCarAction
{
    public function execute(CarData $carData): Car
    {
        return Car::create([
            'year'  => $carData->getYear(),
            'make'  => $carData->getMake(),
            'model' => $carData->getModel()
        ]);
    }
}
