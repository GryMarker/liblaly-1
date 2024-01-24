<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot()
{
    $this->registerPolicies();

    \Auth::provider('admin', function ($app, array $config) {
        return new \App\Providers\AdminUserProvider($app['hash'], $config['model']);
    });

    \Auth::extend('admin', function ($app, $name, array $config) {
        return new \App\Guards\AdminGuard(\Auth::createUserProvider($config['provider']), $app->make('request'));
    });
}
}
