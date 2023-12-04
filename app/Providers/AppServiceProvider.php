<?php

namespace App\Providers;

use App\Models\Gender;
use App\Models\Group;
use App\Models\Sound;
use App\Models\Type;
use App\Services\GenderService;
use App\Services\GroupService;
use App\Services\SoundService;
use App\Services\TypeService;
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
        $this->app->bind(GroupService::class, GroupService::class);
        $this->app->bind(Group::class, Group::class);
        $this->app->bind(SoundService::class, SoundService::class);
        $this->app->bind(Sound::class, Sound::class);
        $this->app->bind(TypeService::class, TypeService::class);
        $this->app->bind(Type::class, Type::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
