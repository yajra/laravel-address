<?php

namespace Yajra\Address\Repositories\Barangays;

use Illuminate\Database\Eloquent\Collection;
use Yajra\Address\Repositories\EloquentRepositoryInterface;

interface BarangaysRepository extends EloquentRepositoryInterface
{
    /**
     * Get barangays by region, province and city ID.
     *
     * @return \Illuminate\Database\Eloquent\Collection<\Yajra\Address\Entities\Barangay>
     */
    public function getByProvinceRegionAndCityId(string $regionId, string $provinceId, string $cityId): Collection;

    /**
     * Get barangays by region, province and city ID.
     *
     * @return \Illuminate\Database\Eloquent\Collection<\Yajra\Address\Entities\Barangay>
     */
    public function getByCity(string $cityId): Collection;
}
