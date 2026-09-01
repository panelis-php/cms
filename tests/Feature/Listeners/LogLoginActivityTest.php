<?php

use Illuminate\Auth\Events\Login;
use Illuminate\Auth\Events\Logout;
use Illuminate\Foundation\Testing\LazilyRefreshDatabase;
use Panelis\Cms\Tests\Models\User;

uses(LazilyRefreshDatabase::class);

it('logs a successful login with its user as causer and subject', function (): void {
    $user = User::query()->create([
        'name' => 'Login User',
        'email' => 'login@example.com',
    ]);

    event(new Login('web', $user, false));

    $this->assertDatabaseHas('activity_log', [
        'log_name' => 'auth',
        'description' => 'cms::activity.login',
        'event' => 'login',
        'causer_type' => $user->getMorphClass(),
        'causer_id' => $user->getKey(),
        'subject_type' => $user->getMorphClass(),
        'subject_id' => $user->getKey(),
    ]);
});

it('logs a logout with its user as causer and subject', function (): void {
    $user = User::query()->create([
        'name' => 'Logout User',
        'email' => 'logout@example.com',
    ]);

    event(new Logout('web', $user));

    $this->assertDatabaseHas('activity_log', [
        'log_name' => 'auth',
        'description' => 'cms::activity.logout',
        'event' => 'logout',
        'causer_type' => $user->getMorphClass(),
        'causer_id' => $user->getKey(),
        'subject_type' => $user->getMorphClass(),
        'subject_id' => $user->getKey(),
    ]);
});
