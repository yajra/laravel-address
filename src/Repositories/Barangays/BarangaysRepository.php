<?php

namespace Yajra\Address\Repositories\Barangays;

use Yajra\Address\Repositories\EloquentRepositoryInterface;

interface BarangaysRepository extends EloquentRepositoryInterface
{
    /**
     * Get barangays by region, province and city ID.
     *
     * @param int $regionId
     * @param int $provinceId
     * @param int $cityId
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getByProvinceRegionAndCityId($regionId, $provinceId, $cityId);

    /**
     * Get barangays by region, province and city ID.
     *
     * @param int $cityId
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getByCity($cityId);
}
