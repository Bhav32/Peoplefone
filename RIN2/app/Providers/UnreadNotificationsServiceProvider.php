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
        View::composer('layouts.home', function ($view) {
            if (Auth::check()) {
                $user = Auth::user();
                $notifications =  $user->unreadNotifications();
                $UnreadNotificationsCount = count($notifications);

                $view->with([
                    'notifications' => $notifications,
                    'UnreadNotificationsCount' => $UnreadNotificationsCount,
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
