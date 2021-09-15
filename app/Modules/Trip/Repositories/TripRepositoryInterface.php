<?php

namespace App\Modules\Trip\Repositories;

use App\Modules\Trip\Models\Trip;
use Illuminate\Database\Eloquent\Collection;

interface TripRepositoryInterface
{
    public function findOrFail(int $id): Trip;

    public function getAll(): Collection;
}
