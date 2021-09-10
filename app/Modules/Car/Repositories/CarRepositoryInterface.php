<?php

namespace App\Modules\Car\Repositories;

use App\Modules\Car\Models\Car;
use Illuminate\Database\Eloquent\Collection;

interface CarRepositoryInterface
{
    public function findOrFail(int $id): Car;

    public function getAll(): Collection;
}
