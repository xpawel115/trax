<?php

namespace App\Modules\Trip\Repositories;

use App\Modules\Trip\Models\Trip;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class TripRepository implements TripRepositoryInterface
{
    public function findOrFail(int $id): Trip
    {
        return $this->getQuery()->findOrFail($id);
    }

    public function getAll(): Collection
    {
        return $this->getQuery()->get();
    }


    private function getQuery(): Builder
    {
        return Trip::with('car');
    }
}
