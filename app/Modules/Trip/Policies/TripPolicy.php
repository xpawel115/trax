<?php

namespace App\Modules\Trip\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class TripPolicy
{
    use HandlesAuthorization;

    public function getTrips(User $user): bool
    {
        return true;
    }

    public function createTrip(User $user): bool
    {
        return true;
    }
}
