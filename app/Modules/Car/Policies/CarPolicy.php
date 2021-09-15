<?php

namespace App\Modules\Car\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CarPolicy
{
    use HandlesAuthorization;

    public function getCars(User $user): bool
    {
        return true;
    }

    public function show(User $user): bool
    {
        return true;
    }

    public function create(User $user): bool
    {
        return true;
    }

    public function destroy(User $user): bool
    {
        return true;
    }
}
