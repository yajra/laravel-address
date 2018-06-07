<?php

namespace Yajra\Address\Repositories;

interface BarangaysRepository extends EloquentRepositoryInterface
{
    /**
     * Get barangays by region, province and city ID.
     *
     * @param int $regionId
     * @param int $provinceId
     * @param int $cityId
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getByProvinceRegionAndCityId($regionId, $provinceId, $cityId);
}
