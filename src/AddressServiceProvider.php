<?php

namespace Yajra\Address;

use Illuminate\Support\ServiceProvider;
use Yajra\Address\Repositories\BarangaysRepository;
use Yajra\Address\Repositories\BarangaysRepositoryEloquent;
use Yajra\Address\Repositories\CachingBarangaysRepository;
use Yajra\Address\Repositories\CachingCitiesRepository;
use Yajra\Address\Repositories\CachingProvincesRepository;
use Yajra\Address\Repositories\CachingRegionsRepository;
use Yajra\Address\Repositories\CitiesRepository;
use Yajra\Address\Repositories\CitiesRepositoryEloquent;
use Yajra\Address\Repositories\ProvincesRepository;
use Yajra\Address\Repositories\ProvincesRepositoryEloquent;
use Yajra\Address\Repositories\RegionsRepository;
use Yajra\Address\Repositories\RegionsRepositoryEloquent;

class AddressServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadMigrationsFrom( __DIR__ . '/../database/migrations');
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(RegionsRepository::class, function () {
            return new CachingRegionsRepository(
                $this->app->make(RegionsRepositoryEloquent::class),
                $this->app['cache.store']
            );
        });
        $this->app->singleton(ProvincesRepository::class, function () {
            return new CachingProvincesRepository(
                $this->app->make(ProvincesRepositoryEloquent::class),
                $this->app['cache.store']
            );
        });
        $this->app->singleton(CitiesRepository::class, function () {
            return new CachingCitiesRepository(
                $this->app->make(CitiesRepositoryEloquent::class),
                $this->app['cache.store']
            );
        });
        $this->app->singleton(BarangaysRepository::class, function () {
            return new CachingBarangaysRepository(
                $this->app->make(BarangaysRepositoryEloquent::class),
                $this->app['cache.store']
            );
        });
    }
}
