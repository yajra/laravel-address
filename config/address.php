<?php

use Yajra\Address\Entities\City;
use Yajra\Address\Entities\Region;
use Yajra\Address\Entities\Province;
use Yajra\Address\Entities\Barangay;

return [
    /**
     * API Route Prefix
     */
    'prefix'      => '/api/address',

    /**
     * API Route Middleware.
     */
    'middleware'  => [
        'web',
        'auth',
    ],

    /**
     * PSA Official PSGC publication.
     *
     * @see https://psa.gov.ph/classification/psgc/
     */
    'publication' => [
        'path'  => base_path('vendor/yajra/laravel-address/database/seeds/publication/PSGC_Publication_Dec2020.xlsx'),
        'sheet' => 4,
    ],

    'models' => [
        'region'   => Region::class,
        'province' => Province::class,
        'city'     => City::class,
        'barangay' => Barangay::class,
    ],
];
