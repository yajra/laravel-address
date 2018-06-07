<?php

namespace Yajra\Address\Repositories;

use Yajra\Address\Entities\Utilities\Barangay;

class BarangaysRepositoryEloquent extends EloquentBaseRepository implements BarangaysRepository
{
    /**
     * Get repository model.
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function getModel()
    {
        return new Barangay;
    }

    /**
     * Get barangays by region, province and city ID.
     *
     * @param int $regionId
     * @param int $provinceId
     * @param int $cityId
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getByProvinceRegionAndCityId($regionId, $provinceId, $cityId)
    {
        return Barangay::query()
                       ->where('region_id', $regionId)
                       ->where('province_id', $provinceId)
                       ->where('city_id', $cityId)
                       ->orderBy('id', 'asc')
                       ->get();
    }
}
