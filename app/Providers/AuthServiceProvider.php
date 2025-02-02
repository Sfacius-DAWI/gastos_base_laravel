<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\Gasto;
use App\Policies\GastoPolicy;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * El mapeo de políticas para los modelos.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Gasto::class => GastoPolicy::class,
    ];

    /**
     * Registra cualquier servicio de autenticación y autorización.
     */
    public function boot(): void
    {
        $this->registerPolicies();
    }
}
