<?php

use Yajra\Address\Entities\Barangay;
use Yajra\Address\Entities\City;
use Yajra\Address\Entities\Province;
use Yajra\Address\Entities\Region;
use Yajra\Address\Seeders\AddressSeeder;

/**
 * PSGC 1Q-2026 National Summary — source of expected values.
 *
 * | CODE       | REGION                          | PROV. | CITIES | MUN.  | BGY.  |
 * |------------|---------------------------------|-------|--------|-------|-------|
 * |            | PHILIPPINES                     | 82    | 149    | 1,493 | 42,010 |
 * | 1300000000 | NCR                             | -     | 16     | 1     | 1,715 |
 * | 1400000000 | CAR                             | 6     | 2      | 75    | 1,178 |
 * | 0100000000 | Region I                        | 4     | 9      | 116   | 3,267 |
 * | 0200000000 | Region II                       | 5     | 4      | 89    | 2,311 |
 * | 0300000000 | Region III                      | 7     | 15     | 115   | 3,105 |
 * | 0400000000 | Region IV-A                     | 5     | 22     | 120   | 3,992 |
 * | 1700000000 | MIMAROPA                        | 5     | 2      | 71    | 1,460 |
 * | 0500000000 | Region V                        | 6     | 7      | 107   | 3,471 |
 * | 0600000000 | Region VI                       | 5     | 3      | 98    | 3,389 |
 * | 1800000000 | Negros Island Region (NIR)      | 3     | 19     | 44    | 1,353 |
 * | 0700000000 | Region VII                      | 2     | 10     | 91    | 2,312 |
 * | 0800000000 | Region VIII                     | 6     | 7      | 136   | 4,365 |
 * | 0900000000 | Region IX                       | 4     | 5      | 86    | 2,314 |
 * | 1000000000 | Region X                        | 5     | 9      | 84    | 2,022 |
 * | 1100000000 | Region XI                       | 5     | 6      | 43    | 1,162 |
 * | 1200000000 | Region XII                      | 4     | 4      | 45    | 1,097 |
 * | 1600000000 | Region XIII                     | 5     | 6      | 67    | 1,312 |
 * | 1900000000 | BARMM                           | 5     | 3      | 105   | 2,185 |
 */
$perRegionBarangays = [
    '01' => 3267, '02' => 2311, '03' => 3105, '04' => 3992,
    '05' => 3471, '06' => 3389, '07' => 2312, '08' => 4365,
    '09' => 2314, '10' => 2022, '11' => 1162, '12' => 1097,
    '13' => 1715, '14' => 1178, '16' => 1312, '17' => 1460,
    '18' => 1353, '19' => 2185,
];

test('PSGC 1Q-2026 seed matches national summary', function () use ($perRegionBarangays) {
    $publication = realpath(__DIR__.'/../../database/seeders/publication/PSGC-1Q-2026-Publication-Datafile.xlsx');

    $this->app['config']->set('address.publication.path', $publication);
    $this->app['config']->set('address.publication.sheet', 4);

    $this->loadMigrationsFrom(realpath(__DIR__.'/../../database/migrations'));
    $this->seed(AddressSeeder::class);

    expect(Region::count())->toBe(18);
    expect(Barangay::count())->toBe(42010);

    foreach ($perRegionBarangays as $regionId => $expectedCount) {
        expect(Barangay::where('region_id', $regionId)->count())
            ->toBe($expectedCount, "Barangay count mismatch for region_id: {$regionId}");
    }

    expect(Province::count())->toBeGreaterThan(82);
    expect(City::count())->toBeGreaterThan(1641);
    expect(City::where('code', '1380600000')->exists())->toBeFalse();

    foreach (Region::pluck('region_id') as $regionId) {
        expect(Barangay::where('region_id', $regionId)->exists())
            ->toBeTrue("Region {$regionId} has no barangays");
    }

    expect(Barangay::whereRaw('LENGTH(code) != 10')->count())->toBe(0);
});
