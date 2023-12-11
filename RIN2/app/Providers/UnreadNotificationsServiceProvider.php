<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;

class UnreadNotificationsServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        View::composer('layouts.dashboard', function ($view) {
            if (Auth::check()) {
                $user = Auth::user();
                $userWithUnreadNotifications = $user->withUnreadNotificationsCount()->first();

                $view->with([
                    'notifications' => $userWithUnreadNotifications->notifications,
                    'unreadNotificationCount' => $userWithUnreadNotifications->unread_notifications,
                ]);
            }
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
