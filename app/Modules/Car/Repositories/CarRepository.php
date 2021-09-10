<?php

declare(strict_types=1);

namespace App\Modules\Car\Repositories;

use App\Modules\Car\Models\Car;
use Illuminate\Database\Eloquent\Collection;

class CarRepository implements CarRepositoryInterface
{

    public function findOrFail(int $id): Car
    {
        return Car::findOrFail($id);
    }

    public function getAll(): Collection
    {
        return Car::all();
    }
}
