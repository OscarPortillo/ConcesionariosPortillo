<?php

namespace App\Policies;

use App\User;
use App\Venta;
use Illuminate\Auth\Access\HandlesAuthorization;

class VentasPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the venta.
     *
     * @param  \App\User  $user
     * @param  \App\Venta  $venta
     * @return mixed
     */
    public function view(User $user, Venta $venta)
    {
        if ( $user->id == $venta->id_empleado || $user->id == $venta->id_cliente) { // mejorar esta parte
            return true;
        }
        if ( $user->role_id  === 1) {
            return true;
        }
    }

    /**
     * Determine whether the user can create ventas.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the venta.
     *
     * @param  \App\User  $user
     * @param  \App\Venta  $venta
     * @return mixed
     */
    public function update(User $user, Venta $venta)
    {
        if ( $user->role_id == 1 || $user->role_id == 2 ) {

            return true;
        }
    }

    /**
     * Determine whether the user can delete the venta.
     *
     * @param  \App\User  $user
     * @param  \App\Venta  $venta
     * @return mixed
     */
    public function delete(User $user, Venta $venta)
    {
        return $user->role_id == 1;
    }

    /**
     * Determine whether the user can restore the venta.
     *
     * @param  \App\User  $user
     * @param  \App\Venta  $venta
     * @return mixed
     */
    public function restore(User $user, Venta $venta)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the venta.
     *
     * @param  \App\User  $user
     * @param  \App\Venta  $venta
     * @return mixed
     */
    public function forceDelete(User $user, Venta $venta)
    {
        //
    }
}
