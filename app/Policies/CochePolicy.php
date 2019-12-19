<?php

namespace App\Policies;

use App\User;
use App\Coche;
use Illuminate\Auth\Access\HandlesAuthorization;

class CochePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the coche.
     *
     * @param  \App\User  $user
     * @param  \App\Coche  $coche
     * @return mixed
     */
    public function view(User $user)
    {
        // 
    }

    /**
     * Determine whether the user can create coches.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->role_id === 1;
    }

    /**
     * Determine whether the user can update the coche.
     *
     * @param  \App\User  $user
     * @param  \App\Coche  $coche
     * @return mixed
     */
    public function update(User $user)
    {
        if ( $user->role_id === 1 || $user->role_id === 2) {
            return true;
        }
    }

    /**
     * Determine whether the user can delete the coche.
     *
     * @param  \App\User  $user
     * @param  \App\Coche  $coche
     * @return mixed
     */
    public function delete(User $user)
    {
        return $user->role_id === 1;
    }

    /**
     * Determine whether the user can restore the coche.
     *
     * @param  \App\User  $user
     * @param  \App\Coche  $coche
     * @return mixed
     */
    public function restore(User $user, Coche $coche)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the coche.
     *
     * @param  \App\User  $user
     * @param  \App\Coche  $coche
     * @return mixed
     */
    public function forceDelete(User $user, Coche $coche)
    {
        //
    }
}
