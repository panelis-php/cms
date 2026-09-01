<?php

namespace Panelis\Cms\Listeners;

use Illuminate\Auth\Events\Login;

class LogLoginActivity
{
    public function handle(Login $event): void
    {
        activity('auth')
            ->causedBy($event->user)
            ->performedOn($event->user)
            ->event('login')
            ->withProperties([
                'guard' => $event->guard,
                'remember' => $event->remember,
            ])
            ->log('cms::activity.login');
    }
}
