<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Laravel\Passport\Passport;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        /* define a super-admin user role */
        Gate::define('isSuperAdmin', function($user) {
            return $user->role == 'super-admin';
        });
        /* define a admin user role */
        Gate::define('isAdmin', function($user) {
            return $user->role == 'admin';
        });

        /* define a chauuffeur user role */
        // Gate::define('isChauffeur', function($user) {
        //     return $user->role == 'chauffeur';
        // });

          /* define a chef gare user role */
          Gate::define('isChefGare', function($user) {
            return $user->role == 'chef_gare';
        });

        /* define a user role */
        Gate::define('isUser', function($user) {
            return $user->role == 'user';
        });

        Passport::routes();
        // Passport::personalAccessClientId('client-id');

    }
}
