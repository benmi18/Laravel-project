<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('owner-only', function($user){
            if ($user->role == 'owner') {
                return true;
            }
            return false;
        });

        Gate::define('manager', function($user){
            if ($user->role == 'manager' || $user->role == 'owner') {
                return true;
            }
            return false;
        });

        Gate::define('sales', function($user){
            if ($user->role == 'sales') {
                return true;
            }
            return false;
        });
    }
}
