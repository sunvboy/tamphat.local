<?php

namespace App\Policies;

use App\Models\TourCategory;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class TourCategoryPolicy
{
    use HandlesAuthorization;
    public function index(User $user)
    {
        return $user->checkPermissionAccess(config('permissions.tour_categories.index'));
    }

    public function create(User $user)
    {
        return $user->checkPermissionAccess(config('permissions.tour_categories.create'));
    }

    public function edit(User $user)
    {
        return $user->checkPermissionAccess(config('permissions.tour_categories.edit'));
    }


    public function destroy(User $user)
    {
        return $user->checkPermissionAccess(config('permissions.tour_categories.destroy'));
    }
}
