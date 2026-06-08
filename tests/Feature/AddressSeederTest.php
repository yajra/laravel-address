<?php

use Yajra\Address\Entities\Barangay;
use Yajra\Address\Entities\City;
use Yajra\Address\Entities\Province;
use Yajra\Address\Entities\Region;
use Yajra\Address\Seeders\AddressSeeder;

/**
 * National summary counts from the PSGC 1Q-2026 Publication Datafile.
 *
 * From the "NATIONAL SUMMARY" tab:
 *
 * | CODE       | REGION                          | PROV. | CITIES | MUN.  | BGY.  | POPULATION  |
 * |------------|---------------------------------|-------|--------|-------|-------|-------------|
 * |            | PHILIPPINES                     | 82    | 149    | 1,493 | 42,010 | 112,729,484 |
 * | 1300000000 | NCR                             | -     | 16     | 1     | 1,715 | 14,001,751  |
 * | 1400000000 | CAR                             | 6     | 2      | 75    | 1,178 | 1,808,985   |
 * | 0100000000 | Region I                        | 4     | 9      | 116   | 3,267 | 5,342,453   |
 * | 0200000000 | Region II                       | 5     | 4      | 89    | 2,311 | 3,777,608   |
 * | 0300000000 | Region III                      | 7     | 15     | 115   | 3,105 | 12,989,074  |
 * | 0400000000 | Region IV-A                     | 5     | 22     | 120   | 3,992 | 16,933,234  |
 * | 1700000000 | MIMAROPA                        | 5     | 2      | 71    | 1,460 | 3,245,446   |
 * | 0500000000 | Region V                        | 6     | 7      | 107   | 3,471 | 6,064,426   |
 * | 0600000000 | Region VI                       | 5     | 3      | 98    | 3,389 | 4,861,911   |
 * | 1800000000 | Negros Island Region (NIR)      | 3     | 19     | 44    | 1,353 | 4,904,944   |
 * | 0700000000 | Region VII                      | 2     | 10     | 91    | 2,312 | 6,640,875   |
 * | 0800000000 | Region VIII                     | 6     | 7      | 136   | 4,365 | 4,625,929   |
 * | 0900000000 | Region IX                       | 4     | 5      | 86    | 2,314 | 5,089,934   |
 * | 1000000000 | Region X                        | 5     | 9      | 84    | 2,022 | 5,178,326   |
 * | 1100000000 | Region XI                       | 5     | 6      | 43    | 1,162 | 5,389,422   |
 * | 1200000000 | Region XII                      | 4     | 4      | 45    | 1,097 | 4,462,776   |
 * | 1600000000 | Region XIII                     | 5     | 6      | 67    | 1,312 | 2,865,196   |
 * | 1900000000 | BARMM                           | 5     | 3      | 105   | 2,185 | 4,545,486   |
 */
beforeEach(function () {
    $publication = realpath(__DIR__.'/../../database/seeders/publication/PSGC-1Q-2026-Publication-Datafile.xlsx');

    $this->app['config']->set('address.publication.path', $publication);
    $this->app['config']->set('address.publication.sheet', 4);

    $this->loadMigrationsFrom(realpath(__DIR__.'/../../database/migrations'));

    $this->seed(AddressSeeder::class);
});

it('seeds 18 regions matching the national summary', function () {
    expect(Region::count())->toBe(18);
});

it('seeds total barangays matching the national summary of 42,010', function () {
    expect(Barangay::count())->toBe(42010);
});

it('seeds per-region barangay counts matching the national summary', function () {
    $expected = [
        '01' => 3267, // Region I
        '02' => 2311, // Region II
        '03' => 3105, // Region III
        '04' => 3992, // Region IV-A (CALABARZON)
        '05' => 3471, // Region V
        '06' => 3389, // Region VI
        '07' => 2312, // Region VII
        '08' => 4365, // Region VIII
        '09' => 2314, // Region IX
        '10' => 2022, // Region X
        '11' => 1162, // Region XI
        '12' => 1097, // Region XII
        '13' => 1715, // NCR
        '14' => 1178, // CAR
        '16' => 1312, // Region XIII (Caraga)
        '17' => 1460, // MIMAROPA
        '18' => 1353, // NIR
        '19' => 2185, // BARMM
    ];

    foreach ($expected as $regionId => $expectedCount) {
        expect(Barangay::where('region_id', $regionId)->count())
            ->toBe($expectedCount, "Barangay count mismatch for region_id: {$regionId}");
    }
});

it('seeds province entries treating HUCs and NCR as own provinces', function () {
    // The seeder creates province entries for:
    // 1. Actual provinces (82 according to PSA)
    // 2. Highly Urbanized Cities (HUCs) as their own province
    // 3. NCR cities/municipalities as their own province
    // This results in a higher count than the 82 official provinces.
    $count = Province::count();

    expect($count)->toBeGreaterThan(82);
});

it('seeds combined city and municipality entries', function () {
    // The seeder combines cities (149), municipalities (1,493),
    // and sub-municipalities into a single `cities` table,
    // excluding the City of Manila (code 1380600000).
    $count = City::count();

    expect($count)->toBeGreaterThan(1641);

    // City of Manila should not be in cities table
    expect(City::where('code', '1380600000')->exists())->toBeFalse();
});

it('seeds at least one barangay per region', function () {
    $regions = Region::pluck('region_id');

    foreach ($regions as $regionId) {
        expect(Barangay::where('region_id', $regionId)->exists())
            ->toBeTrue("Region {$regionId} has no barangays");
    }
});

it('seeds all barangay code formats are valid', function () {
    $invalid = Barangay::whereRaw('LENGTH(code) != 10')->count();
    expect($invalid)->toBe(0, 'Some barangay codes are not 10 digits');
});
