<?php

namespace App\Providers;

use App\Repositories\BaseRepository;
use App\Repositories\Interface\IBaseRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(IBaseRepository::class, BaseRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
