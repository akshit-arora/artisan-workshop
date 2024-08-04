<?php

namespace App\Providers;

use App\Services\Workshop;
use Illuminate\Support\ServiceProvider;

/**
 * Class WorkshopServiceProvider
 * Service provider for the workshop service
 * 
 * @package App\Providers
 */
class WorkshopServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton('workshop', function () {
            return new Workshop();
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
