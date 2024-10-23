<?php

namespace Yajra\Address;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Yajra\Address\Controllers\BarangaysController;
use Yajra\Address\Controllers\CitiesController;
use Yajra\Address\Controllers\ProvincesController;
use Yajra\Address\Controllers\RegionsController;
use Yajra\Address\Repositories\Barangays\BarangaysRepository;
use Yajra\Address\Repositories\Barangays\BarangaysRepositoryEloquent;
use Yajra\Address\Repositories\Barangays\CachingBarangaysRepository;
use Yajra\Address\Repositories\Cities\CachingCitiesRepository;
use Yajra\Address\Repositories\Cities\CitiesRepository;
use Yajra\Address\Repositories\Cities\CitiesRepositoryEloquent;
use Yajra\Address\Repositories\Provinces\CachingProvincesRepository;
use Yajra\Address\Repositories\Provinces\ProvincesRepository;
use Yajra\Address\Repositories\Provinces\ProvincesRepositoryEloquent;
use Yajra\Address\Repositories\Regions\CachingRegionsRepository;
use Yajra\Address\Repositories\Regions\RegionsRepository;
use Yajra\Address\Repositories\Regions\RegionsRepositoryEloquent;

class AddressServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');

        $this->mergeConfigFrom($config = __DIR__.'/../config/address.php', 'address');
        if ($this->app->runningInConsole()) {
            $this->publishes([$config => config_path('address.php')], 'address');
        }

        $this->setupViews();
        $this->setupRoutes();
        $this->setupMacro();
    }

    protected function setupViews(): void
    {
        view()->composer('address::form', function () {
            /** @var RegionsRepository $repo */
            $repo = app(RegionsRepository::class);
            view()->share('regions', $repo->all()->pluck('name', 'region_id'));
        });

        $this->loadViewsFrom(__DIR__.'/Views', 'address');

        $this->publishes([
            __DIR__.'/Views' => resource_path('views/vendor/address'),
        ], 'address');
    }

    protected function setupRoutes(): void
    {
        Route::group([
            'prefix' => config('address.prefix'),
            'middleware' => config('address.middleware'),
            'as' => 'address.',
        ], function () {
            // Regions routes
            Route::get('regions', [RegionsController::class, 'all'])->name('regions.all');

            // Provinces routes
            Route::get('provinces', [ProvincesController::class, 'all'])->name('provinces.all');
            Route::get(
                'provinces/{regionId}',
                [ProvincesController::class, 'getByRegion']
            )->name('provinces.region');

            // Cities routes
            Route::get(
                'cities/{provinceId}',
                [CitiesController::class, 'getByProvince']
            )->name('cities.province');
            Route::get(
                'cities/{regionId}/{provinceId}',
                [CitiesController::class, 'getByRegionAndProvince']
            )->name('cities.region.province');

            // Barangays routes
            Route::get(
                'barangays/{cityId}',
                [BarangaysController::class, 'getByCity']
            )->name('barangay.city');
        });
    }

    protected function setupMacro(): void
    {
        Blueprint::macro('address', function () {
            /** @var Blueprint $this */
            $this->string('street')->nullable();
            $this->string('barangay_id', 10)->nullable()->index();
            $this->string('city_id', 7)->nullable()->index();
            $this->string('province_id', 5)->nullable()->index();
            $this->string('region_id', 2)->nullable()->index();
        });

        Blueprint::macro('dropAddress', function () {
            /** @var Blueprint $this */
            $this->dropColumn(['region_id', 'province_id', 'city_id', 'barangay_id', 'street']);
        });
    }

    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(RegionsRepository::class, fn () => new CachingRegionsRepository(
            $this->app->make(RegionsRepositoryEloquent::class),
            resolve('cache.store')
        ));
        $this->app->singleton(ProvincesRepository::class, fn () => new CachingProvincesRepository(
            $this->app->make(ProvincesRepositoryEloquent::class),
            resolve('cache.store')
        ));
        $this->app->singleton(CitiesRepository::class, fn () => new CachingCitiesRepository(
            $this->app->make(CitiesRepositoryEloquent::class),
            resolve('cache.store')
        ));
        $this->app->singleton(BarangaysRepository::class, fn () => new CachingBarangaysRepository(
            $this->app->make(BarangaysRepositoryEloquent::class),
            resolve('cache.store')
        ));
    }
}
