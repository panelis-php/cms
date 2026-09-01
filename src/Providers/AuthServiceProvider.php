<?php

namespace Panelis\Cms\Providers;

use Illuminate\Auth\Events\Login;
use Illuminate\Auth\Events\Logout;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Gate;
use Panelis\Cms\Listeners\LogLoginActivity;
use Panelis\Cms\Listeners\LogLogoutActivity;

class AuthServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        Event::listen(Login::class, LogLoginActivity::class);
        Event::listen(Logout::class, LogLogoutActivity::class);

        Gate::before(function ($user, $ability): ?bool {
            return $user->getRoleNames()->count() === 0 ? true : null;
        });
    }
}
