<?php

namespace App\Providers;

use App\Models\Gender;
use App\Services\GenderService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(GenderService::class, GenderService::class);
        $this->app->bind(Gender::class, Gender::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
