<?php

namespace App\Providers;

use App\Http\Livewire\Hooks\Sidebar\Start;
use Filament\Facades\Filament;
use Filament\Support\Facades\FilamentView;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;

class ProjectServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        // Livewire::component('hooks.sidebar.start', Start::class);

        // Register the resource
        FilamentView::registerRenderHook(
            'panels::sidebar.nav.start',
            fn (): string => Blade::render('@livewire(\'hooks.sidebar.start\')'),
        );

    }
}
