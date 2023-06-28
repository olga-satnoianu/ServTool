<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Models\Notification;
use App\Models\User;
use App\Policies\NotificationPolicy;
use App\Policies\UserPolicy;
use App\Services\Auth\SocialiteGuard;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Laravel\Passport\Passport;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
//        User::class => UserPolicy::class,
//        Notification::class => NotificationPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        Auth::extend('socialite', function ($app, $name, array $config) {
            // Return an instance of Illuminate\Contracts\Auth\Guard...
            return new SocialiteGuard($app->make('request'));
        });
    }
}
