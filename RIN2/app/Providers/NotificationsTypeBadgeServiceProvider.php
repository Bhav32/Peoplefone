<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;


class NotificationsTypeBadgeServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        View::share('getBadgeClassByType', function ($type) {
            switch ($type) {
                case 'marketing':
                    return 'danger';
                case 'invoices':
                    return 'warning';
                case 'system':
                    return 'info';
                default:
                    return 'secondary';
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
