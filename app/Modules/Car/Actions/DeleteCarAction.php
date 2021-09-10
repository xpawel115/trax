<?php

namespace App\Modules\Car\Actions;

use App\Modules\Car\Models\Car;

class DeleteCarAction
{
    public function execute(Car $car): void
    {
        $car->delete();
    }
}
