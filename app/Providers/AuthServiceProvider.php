<?php

namespace Cookiesoft\Providers;

use Cookiesoft\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'Cookiesoft\Model' => 'Cookiesoft\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        \Gate::define('admin', function ($user){
             return  $user->role == User::ROLE_ADMIN;
        });
    }
}
