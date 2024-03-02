<?php

use Illuminate\Support\Facades\Route;

test('it has built-in routes', function () {
    expect(Route::has('address.regions.all'))->toBeTrue();
    expect(Route::has('address.provinces.all'))->toBeTrue();
    expect(Route::has('address.provinces.region'))->toBeTrue();
    expect(Route::has('address.cities.province'))->toBeTrue();
    expect(Route::has('address.cities.region.province'))->toBeTrue();
    expect(Route::has('address.barangay.city'))->toBeTrue();
});
