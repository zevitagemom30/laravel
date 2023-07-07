<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Contracts\UnityRepositoryContract;
use App\Contracts\UserRepositoryContract;
use App\Contracts\MunicipesRepositoryContract;
use App\Repositories\UserRepository;
use App\Repositories\UnityRepository;
use App\Repositories\MunicipesRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(UnityRepositoryContract::class, UnityRepository::class);
        $this->app->bind(UserRepositoryContract::class, UserRepository::class);
        $this->app->bind(MunicipesRepositoryContract::class, MunicipesRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
