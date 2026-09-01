<?php

namespace Panelis\Cms\Listeners;

use Illuminate\Auth\Events\Logout;

class LogLogoutActivity
{
    public function handle(Logout $event): void
    {
        activity('auth')
            ->causedBy($event->user)
            ->performedOn($event->user)
            ->event('logout')
            ->withProperties([
                'guard' => $event->guard,
            ])
            ->log('cms::activity.logout');
    }
}
