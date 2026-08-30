<?php

namespace Panelis\Cms\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        Gate::before(function ($user, $ability): ?bool {
            return $user->getRoleNames()->count() === 0 ? true : null;
        });
    }
}
