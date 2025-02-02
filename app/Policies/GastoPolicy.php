<?php

namespace App\Policies;

use App\Models\Gasto;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class GastoPolicy
{
    /**
     * Determina si el usuario puede actualizar el gasto.
     */
    public function update(User $user, Gasto $gasto): bool
    {
        return $user->id === $gasto->user_id;
    }

    /**
     * Determina si el usuario puede eliminar el gasto.
     */
    public function delete(User $user, Gasto $gasto): bool
    {
        return $user->id === $gasto->user_id;
    }
}