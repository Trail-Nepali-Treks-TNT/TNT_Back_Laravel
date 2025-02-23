<?php

namespace App\Providers;

use App\Repositories\AccomodationRepository;
use App\Repositories\CategoryRepository;
use App\Repositories\DifficultyLevelRepository;
use App\Repositories\Interface\IAccomodationRepository;
use App\Repositories\Interface\ICategoryRepository;
use App\Repositories\Interface\IDifficultyLevelRepository;
use App\Repositories\Interface\IUserRepository;
use App\Repositories\UserRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(
            IUserRepository::class,
            UserRepository::class
        );

        $this->app->bind(
            IDifficultyLevelRepository::class,
            DifficultyLevelRepository::class
        );

        $this->app->bind(
            IAccomodationRepository::class,
            AccomodationRepository::class
        );

        $this->app->bind(
            ICategoryRepository::class,
            CategoryRepository::class
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
