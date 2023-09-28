<?php

namespace App\Policies;

use App\Models\Room;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class RoomPolicy
{
    use HandlesAuthorization;
    public function index(User $user)
    {
        return $user->checkPermissionAccess(config('permissions.rooms.index'));
    }

    public function create(User $user)
    {
        return $user->checkPermissionAccess(config('permissions.rooms.create'));
    }

    public function edit(User $user)
    {
        return $user->checkPermissionAccess(config('permissions.rooms.edit'));
    }


    public function destroy(User $user)
    {
        return $user->checkPermissionAccess(config('permissions.rooms.destroy'));
    }
}
