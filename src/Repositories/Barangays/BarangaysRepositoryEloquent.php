<?php

namespace Yajra\Address\Repositories\Barangays;

use Yajra\Address\Entities\Barangay;
use Yajra\Address\Repositories\EloquentBaseRepository;

class BarangaysRepositoryEloquent extends EloquentBaseRepository implements BarangaysRepository
{
    /**
     * Get barangays by region, province and city ID.
     *
     * @param int $cityId
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getByCity($cityId)
    {
        return $this->getModel()
                    ->newQuery()
                    ->where('city_id', $cityId)
                    ->orderBy('name', 'asc')
                    ->get();
    }

    /**
     * Get repository model.
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function getModel()
    {
        $model = config('address.models.barangay', Barangay::class);

        return new $model;
    }

    /**
     * Get barangays by region, province and city ID.
     *
     * @param int $regionId
     * @param int $provinceId
     * @param int $cityId
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getByProvinceRegionAndCityId($regionId, $provinceId, $cityId)
    {
        return $this->getModel()
                    ->newQuery()
                    ->where('region_id', $regionId)
                    ->where('province_id', $provinceId)
                    ->where('city_id', $cityId)
                    ->orderBy('name', 'asc')
                    ->get();
    }
}
