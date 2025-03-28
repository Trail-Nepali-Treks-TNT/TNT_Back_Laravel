<?php

namespace App\Providers;

use App\Repositories\ServiceRegionRepository;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class NavbarServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    public function boot()
    {
        $serviceRegionRepository = app(ServiceRegionRepository::class);
        View::composer([
            'Client.layouts.navbar.region-sidenav',
            'Client.layouts.navbar.regionnav',
            'Client.layouts.navbar.service-sidenav',
            'Client.layouts.navbar.servicenav'
        ], function ($view) use ($serviceRegionRepository) {
            $view->with('navigationItems', $serviceRegionRepository->getNavigationItems());
        });
        
        View::composer([
            'Client.Home.destination'
        ], function ($view) use ($serviceRegionRepository) {
            $view->with('regionPackageItems', $serviceRegionRepository->regonPackageItems());
        });
    }
}
