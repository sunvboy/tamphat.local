<?php

namespace App\Policies;

use App\Models\Tour;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class TourPolicy
{
    use HandlesAuthorization;
    public function index(User $user)
    {
        return $user->checkPermissionAccess(config('permissions.tours.index'));
    }

    public function create(User $user)
    {
        return $user->checkPermissionAccess(config('permissions.tours.create'));
    }

    public function edit(User $user)
    {
        return $user->checkPermissionAccess(config('permissions.tours.edit'));
    }


    public function destroy(User $user)
    {
        return $user->checkPermissionAccess(config('permissions.tours.destroy'));
    }
}
