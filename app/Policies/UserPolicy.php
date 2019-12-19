<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User  $user
     * @param  \App\User  $model
     * @return mixed
     */
    public function view(User $user)
    {// Los usuarios solo los pueden ver el admin y empleados
        if ($user->role_id === 1 || $user->role_id === 2){ 
            return true;
        }
    }
    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    { // solo puede crear usuarios el administrador
        return $user->role_id ===1;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\User  $model
     * @return mixed
     */
    public function update(User $user)
    {// Los usuarios solo los pueden actualizar el admin y empleados
        if ($user->role_id === 1 || $user->role_id === 2){ 
            return true;
        }
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\User  $model
     * @return mixed
     */
    public function delete(User $user)
    { // solo el admin puede borrar usuarios
        if ($user->role_id === 1) {
            return true;
        }
    }
}
