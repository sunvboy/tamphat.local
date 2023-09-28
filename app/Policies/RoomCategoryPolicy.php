<?php

namespace App\Policies;

use App\Models\RoomCategory;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class RoomCategoryPolicy
{
    use HandlesAuthorization;

    public function index(User $user)
    {
        return $user->checkPermissionAccess(config('permissions.room_categories.index'));
    }

    public function create(User $user)
    {
        return $user->checkPermissionAccess(config('permissions.room_categories.create'));
    }

    public function edit(User $user)
    {
        return $user->checkPermissionAccess(config('permissions.room_categories.edit'));
    }


    public function destroy(User $user)
    {
        return $user->checkPermissionAccess(config('permissions.room_categories.destroy'));
    }
}
