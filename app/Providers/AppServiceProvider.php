<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\OlimpiadaService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(OlimpiadaService::class, function ($app) {
            return new OlimpiadaService();
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
